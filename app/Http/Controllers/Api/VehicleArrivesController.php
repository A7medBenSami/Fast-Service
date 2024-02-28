<?php

namespace App\Http\Controllers\Api;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArriveResource;
use App\Http\Resources\ArriveCollection;

class VehicleArrivesController extends Controller
{
    public function index(Request $request, Vehicle $vehicle): ArriveCollection
    {
        $this->authorize('view', $vehicle);

        $search = $request->get('search', '');

        $arrives = $vehicle
            ->arrives()
            ->search($search)
            ->latest()
            ->paginate();

        return new ArriveCollection($arrives);
    }

    public function store(Request $request, Vehicle $vehicle): ArriveResource
    {
        $this->authorize('create', Arrive::class);

        $validated = $request->validate([
            'date' => ['required', 'date'],
            'user_id' => ['required', 'exists:users,id'],
            'captain_id' => ['required', 'exists:captains,id'],
            'from_at' => ['required', 'numeric'],
            'from_long' => ['required', 'numeric'],
            'to_lat' => ['required', 'numeric'],
            'to_long' => ['required', 'numeric'],
            'note' => ['nullable', 'max:255', 'string'],
            'cost' => ['nullable', 'numeric'],
            'status' => ['required', 'in:upcoming,completed,cancelled'],
            'address' => ['nullable', 'max:255', 'string'],
            'location_id' => ['required', 'exists:locations,id'],
            'address_id' => ['nullable', 'exists:addresses,id'],
        ]);

        $arrive = $vehicle->arrives()->create($validated);

        return new ArriveResource($arrive);
    }
}
