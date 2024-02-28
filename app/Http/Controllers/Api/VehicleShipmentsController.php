<?php

namespace App\Http\Controllers\Api;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ShipmentResource;
use App\Http\Resources\ShipmentCollection;

class VehicleShipmentsController extends Controller
{
    public function index(
        Request $request,
        Vehicle $vehicle
    ): ShipmentCollection {
        $this->authorize('view', $vehicle);

        $search = $request->get('search', '');

        $shipments = $vehicle
            ->shipments()
            ->search($search)
            ->latest()
            ->paginate();

        return new ShipmentCollection($shipments);
    }

    public function store(Request $request, Vehicle $vehicle): ShipmentResource
    {
        $this->authorize('create', Shipment::class);

        $validated = $request->validate([
            'date' => ['required', 'date'],
            'captain_id' => ['required', 'exists:captains,id'],
            'user_id' => ['required', 'exists:users,id'],
            'from_lat' => ['required', 'numeric'],
            'from_long' => ['required', 'numeric'],
            'to_lat' => ['required', 'numeric'],
            'to_long' => ['required', 'numeric'],
            'description' => ['required', 'max:255', 'string'],
            'cost' => ['nullable', 'numeric'],
            'status' => ['nullable', 'in:upcoming,completed,cancelled,receive'],
            'category_id' => ['required', 'exists:categories,id'],
            'address' => ['nullable', 'max:255', 'string'],
            'address_id' => ['nullable', 'exists:addresses,id'],
            'receiver_data_id' => ['required', 'exists:receiver_data,id'],
            'location_id' => ['required', 'exists:locations,id'],
            'sender_data_id' => ['required', 'exists:sender_data,id'],
        ]);

        $shipment = $vehicle->shipments()->create($validated);

        return new ShipmentResource($shipment);
    }
}
