<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\ReceiverData;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ReceiverDataStoreRequest;
use App\Http\Requests\ReceiverDataUpdateRequest;

class ReceiverDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', ReceiverData::class);

        $search = $request->get('search', '');

        $allReceiverData = ReceiverData::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_receiver_data.index',
            compact('allReceiverData', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', ReceiverData::class);

        return view('app.all_receiver_data.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReceiverDataStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', ReceiverData::class);

        $validated = $request->validated();

        $receiverData = ReceiverData::create($validated);

        return redirect()
            ->route('all-receiver-data.edit', $receiverData)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, ReceiverData $receiverData): View
    {
        $this->authorize('view', $receiverData);

        return view('app.all_receiver_data.show', compact('receiverData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, ReceiverData $receiverData): View
    {
        $this->authorize('update', $receiverData);

        return view('app.all_receiver_data.edit', compact('receiverData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ReceiverDataUpdateRequest $request,
        ReceiverData $receiverData
    ): RedirectResponse {
        $this->authorize('update', $receiverData);

        $validated = $request->validated();

        $receiverData->update($validated);

        return redirect()
            ->route('all-receiver-data.edit', $receiverData)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        ReceiverData $receiverData
    ): RedirectResponse {
        $this->authorize('delete', $receiverData);

        $receiverData->delete();

        return redirect()
            ->route('all-receiver-data.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
