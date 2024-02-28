<?php

namespace App\Http\Controllers\Api;

use App\Models\ReceiverData;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReceiverDataResource;
use App\Http\Resources\ReceiverDataCollection;
use App\Http\Requests\ReceiverDataStoreRequest;
use App\Http\Requests\ReceiverDataUpdateRequest;
use Illuminate\Support\Facades\Auth;


class ReceiverDataController extends Controller
{
    public function index(Request $request): ReceiverDataCollection
{
    // Ensure the user is authorized to view receiver data
    $this->authorize('view-any', ReceiverData::class);

    // Get the authenticated user's ID
    $userId = Auth::user()->id;

    // Get the search parameter from the request
    $search = $request->get('search', '');

    // Modify the query to fetch receiver data only for the authenticated user
    $receiverData = ReceiverData::where('user_id', $userId)
        ->search($search)
        ->latest()
        ->paginate();

    // Return the receiver data collection
    return new ReceiverDataCollection($receiverData);
}


    public function store(
        ReceiverDataStoreRequest $request
    ): ReceiverDataResource {
        $this->authorize('create', ReceiverData::class);

        $validated = $request->validated();

        $receiverData = ReceiverData::create($validated);

        return new ReceiverDataResource($receiverData);
    }

    public function show(
        Request $request,
        ReceiverData $receiverData
    ): ReceiverDataResource {
        $this->authorize('view', $receiverData);

        return new ReceiverDataResource($receiverData);
    }

    public function update(
        ReceiverDataUpdateRequest $request,
        ReceiverData $receiverData
    ): ReceiverDataResource {
        $this->authorize('update', $receiverData);

        $validated = $request->validated();

        $receiverData->update($validated);

        return new ReceiverDataResource($receiverData);
    }

    public function destroy(
        Request $request,
        ReceiverData $receiverData
    ): Response {
        $this->authorize('delete', $receiverData);

        $receiverData->delete();

        return response()->noContent();
    }
}