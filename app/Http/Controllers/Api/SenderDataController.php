<?php

namespace App\Http\Controllers\Api;

use App\Models\SenderData;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\SenderDataResource;
use App\Http\Resources\SenderDataCollection;
use App\Http\Requests\SenderDataStoreRequest;
use App\Http\Requests\SenderDataUpdateRequest;
use Illuminate\Support\Facades\Auth;

class SenderDataController extends Controller
{
    public function index(Request $request): SenderDataCollection
{
    // Ensure the user is authorized to view sender data
    $this->authorize('view-any', SenderData::class);

    // Get the authenticated user's ID
    $userId = Auth::user()->id;

    // Get the search parameter from the request
    $search = $request->get('search', '');

    // Modify the query to fetch sender data only for the authenticated user
    $senderData = SenderData::where('user_id', $userId)
        ->search($search)
        ->latest()
        ->paginate();

    // Return the sender data collection
    return new SenderDataCollection($senderData);
}

    public function store(SenderDataStoreRequest $request): SenderDataResource
    {
        $this->authorize('create', SenderData::class);

        $validated = $request->validated();

        $senderData = SenderData::create($validated);

        return new SenderDataResource($senderData);
    }

    public function show(
        Request $request,
        SenderData $senderData
    ): SenderDataResource {
        $this->authorize('view', $senderData);

        return new SenderDataResource($senderData);
    }

    public function update(
        SenderDataUpdateRequest $request,
        SenderData $senderData
    ): SenderDataResource {
        $this->authorize('update', $senderData);

        $validated = $request->validated();

        $senderData->update($validated);

        return new SenderDataResource($senderData);
    }

    public function destroy(Request $request, SenderData $senderData): Response
    {
        $this->authorize('delete', $senderData);

        $senderData->delete();

        return response()->noContent();
    }
}