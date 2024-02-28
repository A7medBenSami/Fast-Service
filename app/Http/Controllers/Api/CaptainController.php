<?php

namespace App\Http\Controllers\Api;

use App\Models\Captain;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\CaptainResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\CaptainCollection;
use App\Http\Requests\CaptainStoreRequest;
use App\Http\Requests\CaptainUpdateRequest;
use Illuminate\Support\Facades\Hash;

class CaptainController extends Controller
{
    public function index(Request $request): CaptainCollection
    {
        $this->authorize('view-any', Captain::class);

        $search = $request->get('search', '');

        $captains = Captain::where('status','active')->search($search)
            ->latest()
            ->paginate();

        return new CaptainCollection($captains);
    }

    public function store(CaptainStoreRequest $request): CaptainResource
    {
        $this->authorize('create', Captain::class);

        $validated = $request->validated();

        // Hash the password before storing
        $validated['password'] = Hash::make($validated['password']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $captain = Captain::create($validated);

        return new CaptainResource($captain);
    }


    public function show(Request $request, Captain $captain): CaptainResource
    {
        $this->authorize('view', $captain);

        return new CaptainResource($captain);
    }

    public function update(
        CaptainUpdateRequest $request,
        Captain $captain
    ): CaptainResource {
        $this->authorize('update', $captain);

        $validated = $request->validated();

        // Hash the password before updating
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        if ($request->hasFile('image')) {
            if ($captain->image) {
                Storage::delete($captain->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $captain->update($validated);

        return new CaptainResource($captain);
    }

    public function destroy(Request $request, Captain $captain): Response
    {
        $this->authorize('delete', $captain);

        if ($captain->image) {
            Storage::delete($captain->image);
        }

        $captain->delete();

        return response()->noContent();
    }
}