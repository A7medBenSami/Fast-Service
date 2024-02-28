<?php

namespace App\Http\Controllers\Api;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArriveResource;
use App\Http\Resources\ArriveCollection;

class LocationArrivesController extends Controller
{
    public function index(
        Request $request,
        Location $location
    ): ArriveCollection {
        $this->authorize('view', $location);

        $search = $request->get('search', '');

        $arrives = $location
            ->arrives()
            ->search($search)
            ->latest()
            ->paginate();

        return new ArriveCollection($arrives);
    }

    public function store(Request $request, Location $location): ArriveResource
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
            'vehicle_id' => ['required', 'exists:vehicles,id'],
            'address' => ['nullable', 'max:255', 'string'],
            'address_id' => ['nullable', 'exists:addresses,id'],
        ]);

        $arrive = $location->arrives()->create($validated);

        return new ArriveResource($arrive);
    }
}
