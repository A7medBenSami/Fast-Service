<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArriveResource;
use App\Http\Resources\ArriveCollection;

class UserArrivesController extends Controller
{
    public function index(Request $request, User $user): ArriveCollection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $arrives = $user
            ->arrives()
            ->search($search)
            ->latest()
            ->paginate();

        return new ArriveCollection($arrives);
    }

    public function store(Request $request, User $user): ArriveResource
    {
        $this->authorize('create', Arrive::class);

        $validated = $request->validate([
            'date' => ['required', 'date'],
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
            'address_id' => ['nullable', 'exists:addresses,id'],
        ]);

        $arrive = $user->arrives()->create($validated);

        return new ArriveResource($arrive);
    }
}
