<?php

namespace App\Http\Controllers;

use App\Models\OurData;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\OurDataStoreRequest;
use App\Http\Requests\OurDataUpdateRequest;

class OurDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', OurData::class);

        $search = $request->get('search', '');

        $allOurData = OurData::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.all_our_data.index', compact('allOurData', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create(Request $request): View
    // {
    //     $this->authorize('create', OurData::class);

    //     return view('app.all_our_data.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(OurDataStoreRequest $request): RedirectResponse
    // {
    //     $this->authorize('create', OurData::class);

    //     $validated = $request->validated();

    //     $ourData = OurData::create($validated);

    //     return redirect()
    //         ->route('all-our-data.edit', $ourData)
    //         ->withSuccess(__('crud.common.created'));
    // }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, OurData $ourData): View
    {
        $this->authorize('view', $ourData);

        return view('app.all_our_data.show', compact('ourData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, OurData $ourData): View
    {
        $this->authorize('update', $ourData);

        return view('app.all_our_data.edit', compact('ourData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        OurDataUpdateRequest $request,
        OurData $ourData
    ): RedirectResponse {
        $this->authorize('update', $ourData);

        $validated = $request->validated();

        $ourData->update($validated);

        return redirect()
            ->route('all-our-data.edit', $ourData)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        OurData $ourData
    ): RedirectResponse {
        $this->authorize('delete', $ourData);

        $ourData->delete();

        return redirect()
            ->route('all-our-data.index')
            ->withSuccess(__('crud.common.removed'));
    }
}