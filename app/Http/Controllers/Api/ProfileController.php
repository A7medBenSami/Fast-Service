<?php

namespace App\Http\Controllers\Api;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProfileCollection;
use App\Http\Requests\ProfileStoreRequest;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function index(Request $request): ProfileCollection
    {
        $this->authorize('view-any', Profile::class);

        $search = $request->get('search', '');

        $profiles = Profile::search($search)
            ->latest()
            ->paginate();

        return new ProfileCollection($profiles);
    }

    public function store(ProfileStoreRequest $request): ProfileResource
    {
        $this->authorize('create', Profile::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $profile = Profile::create($validated);

        return new ProfileResource($profile);
    }

    public function show(Request $request, Profile $profile): ProfileResource
    {
        $this->authorize('view', $profile);

        return new ProfileResource($profile);
    }

    public function update(
        ProfileUpdateRequest $request,
        Profile $profile
    ): ProfileResource {
        $this->authorize('update', $profile);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($profile->image) {
                Storage::delete($profile->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $profile->update($validated);

        return new ProfileResource($profile);
    }

    public function destroy(Request $request, Profile $profile): Response
    {
        $this->authorize('delete', $profile);

        if ($profile->image) {
            Storage::delete($profile->image);
        }

        $profile->delete();

        return response()->noContent();
    }
}
