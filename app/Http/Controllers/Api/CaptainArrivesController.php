<?php

namespace App\Http\Controllers\Api;

use App\Models\Captain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArriveResource;
use App\Http\Resources\ArriveCollection;

class CaptainArrivesController extends Controller
{
    public function index(Request $request, Captain $captain): ArriveCollection
    {
        $this->authorize('view', $captain);

        $search = $request->get('search', '');

        $arrives = $captain
            ->arrives()
            ->search($search)
            ->latest()
            ->paginate();

        return new ArriveCollection($arrives);
    }

    public function store(Request $request, Captain $captain): ArriveResource
    {
        $this->authorize('create', Arrive::class);

        $validated = $request->validate([
            'date' => ['required', 'date'],
            'user_id' => ['required', 'exists:users,id'],
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
            'address_id' => ['nullable', 'exists:addresses,id'],
        ]);

        $arrive = $captain->arrives()->create($validated);

        return new ArriveResource($arrive);
    }
}
