<?php

namespace App\Http\Controllers\Api;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ShipmentResource;
use App\Http\Resources\ShipmentCollection;
use App\Http\Requests\ShipmentStoreRequest;
use App\Http\Requests\ShipmentUpdateRequest;
use Illuminate\Support\Facades\Auth;


class ShipmentController extends Controller
{
   public function index(Request $request): ShipmentCollection
{
    // Ensure the user is authorized to view shipments
    $this->authorize('view-any', Shipment::class);

    // Get the authenticated user's ID
    $userId = Auth::user()->id;

    // Get the search parameter from the request
    $search = $request->get('search', '');

    // Modify the query to fetch shipments only for the authenticated user
    $shipments = Shipment::where('user_id', $userId)
        ->search($search)
        ->latest()
        ->paginate();

    // Return the shipment collection
    return new ShipmentCollection($shipments);
}


    public function store(ShipmentStoreRequest $request): ShipmentResource
    {
        $this->authorize('create', Shipment::class);

        $validated = $request->validated();

        $shipment = Shipment::create($validated);

        return new ShipmentResource($shipment);
    }

    public function show(Request $request, Shipment $shipment): ShipmentResource
    {
        $this->authorize('view', $shipment);

        return new ShipmentResource($shipment);
    }

    public function update(
        ShipmentUpdateRequest $request,
        Shipment $shipment
    ): ShipmentResource {
        $this->authorize('update', $shipment);

        $validated = $request->validated();

        $shipment->update($validated);

        return new ShipmentResource($shipment);
    }

    public function destroy(Request $request, Shipment $shipment): Response
    {
        $this->authorize('delete', $shipment);

        $shipment->delete();

        return response()->noContent();
    }
}