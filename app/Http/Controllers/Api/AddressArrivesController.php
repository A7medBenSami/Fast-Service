<?php

namespace App\Http\Controllers\Api;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArriveResource;
use App\Http\Resources\ArriveCollection;

class AddressArrivesController extends Controller
{
    public function index(Request $request, Address $address): ArriveCollection
    {
        $this->authorize('view', $address);

        $search = $request->get('search', '');

        $arrives = $address
            ->arrives()
            ->search($search)
            ->latest()
            ->paginate();

        return new ArriveCollection($arrives);
    }

    public function store(Request $request, Address $address): ArriveResource
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
            'location_id' => ['required', 'exists:locations,id'],
        ]);

        $arrive = $address->arrives()->create($validated);

        return new ArriveResource($arrive);
    }
}
