<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\SenderData;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SenderDataStoreRequest;
use App\Http\Requests\SenderDataUpdateRequest;

class SenderDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', SenderData::class);

        $search = $request->get('search', '');

        $allSenderData = SenderData::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.all_sender_data.index',
            compact('allSenderData', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', SenderData::class);

        return view('app.all_sender_data.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SenderDataStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', SenderData::class);

        $validated = $request->validated();

        $senderData = SenderData::create($validated);

        return redirect()
            ->route('all-sender-data.edit', $senderData)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, SenderData $senderData): View
    {
        $this->authorize('view', $senderData);

        return view('app.all_sender_data.show', compact('senderData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, SenderData $senderData): View
    {
        $this->authorize('update', $senderData);

        return view('app.all_sender_data.edit', compact('senderData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        SenderDataUpdateRequest $request,
        SenderData $senderData
    ): RedirectResponse {
        $this->authorize('update', $senderData);

        $validated = $request->validated();

        $senderData->update($validated);

        return redirect()
            ->route('all-sender-data.edit', $senderData)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        SenderData $senderData
    ): RedirectResponse {
        $this->authorize('delete', $senderData);

        $senderData->delete();

        return redirect()
            ->route('all-sender-data.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
