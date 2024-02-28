<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Http\Resources\AddressCollection;

class UserAddressesController extends Controller
{
    public function index(Request $request, User $user): AddressCollection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $addresses = $user
            ->addresses()
            ->search($search)
            ->latest()
            ->paginate();

        return new AddressCollection($addresses);
    }

    public function store(Request $request, User $user): AddressResource
    {
        $this->authorize('create', Address::class);

        $validated = $request->validate([
            'address' => ['required', 'max:255', 'string'],
            'street' => ['required', 'max:255', 'string'],
            'city' => ['required', 'max:255', 'string'],
            'district' => ['required', 'max:255', 'string'],
        ]);

        $address = $user->addresses()->create($validated);

        return new AddressResource($address);
    }
}
