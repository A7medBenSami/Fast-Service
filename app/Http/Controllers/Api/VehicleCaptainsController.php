<?php

namespace App\Http\Controllers\Api;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CaptainResource;
use App\Http\Resources\CaptainCollection;

class VehicleCaptainsController extends Controller
{
    public function index(Request $request, Vehicle $vehicle): CaptainCollection
    {
        $this->authorize('view', $vehicle);

        $search = $request->get('search', '');

        $captains = $vehicle
            ->captains()
            ->search($search)
            ->latest()
            ->paginate();

        return new CaptainCollection($captains);
    }

    public function store(Request $request, Vehicle $vehicle): CaptainResource
    {
        $this->authorize('create', Captain::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'unique:captains,email', 'email'],
            'address' => ['required', 'max:255', 'string'],
            'vehicle_number' => [
                'required',
                'unique:captains,vehicle_number',
                'max:255',
                'string',
            ],
            'license_image' => ['required', 'max:255', 'string'],
            'vehicle_catalog_image' => ['required', 'max:255', 'string'],
            'birth_certificate_image' => ['required', 'max:255', 'string'],
            'status' => ['required', 'in:active,inactive,in_hold'],
            'lat' => ['nullable', 'numeric'],
            'long' => ['nullable', 'numeric'],
            'image' => ['nullable', 'image', 'max:1024'],
            'phone' => [
                'required',
                'unique:captains,phone',
                'max:255',
                'string',
            ],
            'otp' => ['required', 'unique:captains,otp', 'max:255', 'string'],
            'isVerified' => ['required', 'numeric'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $captain = $vehicle->captains()->create($validated);

        return new CaptainResource($captain);
    }
}
