<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Arrive;
use App\Models\Captain;
use App\Models\Vehicle;
use App\Models\Address;
use App\Models\Location;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ArriveStoreRequest;
use App\Http\Requests\ArriveUpdateRequest;

class ArriveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Arrive::class);

        $search = $request->get('search', '');

        $arrives = Arrive::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.arrives.index', compact('arrives', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Arrive::class);

        $users = User::pluck('name', 'id');
        $captains = Captain::pluck('name', 'id');
        $vehicles = Vehicle::pluck('name', 'id');
        $locations = Location::pluck('name', 'id');
        $addresses = Address::pluck('address', 'id');

        return view(
            'app.arrives.create',
            compact('users', 'captains', 'vehicles', 'locations', 'addresses')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArriveStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Arrive::class);

        $validated = $request->validated();

        $arrive = Arrive::create($validated);

        return redirect()
            ->route('arrives.edit', $arrive)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Arrive $arrive): View
    {
        $this->authorize('view', $arrive);

        return view('app.arrives.show', compact('arrive'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Arrive $arrive): View
    {
        $this->authorize('update', $arrive);

        $users = User::pluck('name', 'id');
        $captains = Captain::pluck('name', 'id');
        $vehicles = Vehicle::pluck('name', 'id');
        $locations = Location::pluck('name', 'id');
        $addresses = Address::pluck('address', 'id');

        return view(
            'app.arrives.edit',
            compact(
                'arrive',
                'users',
                'captains',
                'vehicles',
                'locations',
                'addresses'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ArriveUpdateRequest $request,
        Arrive $arrive
    ): RedirectResponse {
        $this->authorize('update', $arrive);

        $validated = $request->validated();

        $arrive->update($validated);

        return redirect()
            ->route('arrives.edit', $arrive)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Arrive $arrive): RedirectResponse
    {
        $this->authorize('delete', $arrive);

        $arrive->delete();

        return redirect()
            ->route('arrives.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
