<?php

namespace App\Http\Controllers;

use App\Models\Captain;
use App\Models\Vehicle;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CaptainStoreRequest;
use App\Http\Requests\CaptainUpdateRequest;
use Illuminate\Support\Facades\Hash;

class CaptainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Captain::class);

        $search = $request->get('search', '');

        $captains = Captain::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.captains.index', compact('captains', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Captain::class);

        $vehicles = Vehicle::pluck('name', 'id');

        return view('app.captains.create', compact('vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CaptainStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Captain::class);

        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        if ($request->hasFile('license_image')) {
            $validated['license_image'] = $request
                ->file('license_image')
                ->store('public');
        }

        if ($request->hasFile('vehicle_catalog_image')) {
            $validated['vehicle_catalog_image'] = $request
                ->file('vehicle_catalog_image')
                ->store('public');
        }

        if ($request->hasFile('birth_certificate_image')) {
            $validated['birth_certificate_image'] = $request
                ->file('birth_certificate_image')
                ->store('public');
        }

        $captain = Captain::create($validated);

        return redirect()
            ->route('captains.edit', $captain)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Captain $captain): View
    {
        $this->authorize('view', $captain);

        return view('app.captains.show', compact('captain'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Captain $captain): View
    {
        $this->authorize('update', $captain);

        $vehicles = Vehicle::pluck('name', 'id');

        return view('app.captains.edit', compact('captain', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CaptainUpdateRequest $request,
        Captain $captain
    ): RedirectResponse {
        $this->authorize('update', $captain);

        $validated = $request->validated();

        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        if ($request->hasFile('image')) {
            if ($captain->image) {
                Storage::delete($captain->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        if ($request->hasFile('license_image')) {
            if ($captain->license_image) {
                Storage::delete($captain->license_image);
            }

            $validated['license_image'] = $request
                ->file('license_image')
                ->store('public');
        }

        if ($request->hasFile('vehicle_catalog_image')) {
            if ($captain->vehicle_catalog_image) {
                Storage::delete($captain->vehicle_catalog_image);
            }

            $validated['vehicle_catalog_image'] = $request
                ->file('vehicle_catalog_image')
                ->store('public');
        }

        if ($request->hasFile('birth_certificate_image')) {
            if ($captain->birth_certificate_image) {
                Storage::delete($captain->birth_certificate_image);
            }

            $validated['birth_certificate_image'] = $request
                ->file('birth_certificate_image')
                ->store('public');
        }

        $captain->update($validated);

        return redirect()
            ->route('captains.edit', $captain)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Captain $captain
    ): RedirectResponse {
        $this->authorize('delete', $captain);

        if ($captain->image) {
            Storage::delete($captain->image);
        }

        if ($captain->license_image) {
            Storage::delete($captain->license_image);
        }

        if ($captain->vehicle_catalog_image) {
            Storage::delete($captain->vehicle_catalog_image);
        }

        if ($captain->birth_certificate_image) {
            Storage::delete($captain->birth_certificate_image);
        }

        $captain->delete();

        return redirect()
            ->route('captains.index')
            ->withSuccess(__('crud.common.removed'));
    }

}