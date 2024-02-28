<?php

namespace App\Http\Controllers\Api;

use App\Models\Arrive;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ArriveResource;
use App\Http\Resources\ArriveCollection;
use App\Http\Requests\ArriveStoreRequest;
use App\Http\Requests\ArriveUpdateRequest;
use Illuminate\Support\Facades\Auth;


class ArriveController extends Controller
{
    public function index(Request $request): ArriveCollection
{
    // Ensure the user is authorized to view arrives
    $this->authorize('view-any', Arrive::class);

    // Get the authenticated user's ID
    $userId = Auth::user()->id;

    // Get the search parameter from the request
    $search = $request->get('search', '');

    // Modify the query to fetch arrives only for the authenticated user
    $arrives = Arrive::where('user_id', $userId)
        ->search($search)
        ->latest()
        ->paginate();

    // Return the arrive collection
    return new ArriveCollection($arrives);
}

    public function store(ArriveStoreRequest $request): ArriveResource
    {
        $this->authorize('create', Arrive::class);

        $validated = $request->validated();

        $arrive = Arrive::create($validated);

        return new ArriveResource($arrive);
    }

    public function show(Request $request, Arrive $arrive): ArriveResource
    {
        $this->authorize('view', $arrive);

        return new ArriveResource($arrive);
    }

    public function update(
        ArriveUpdateRequest $request,
        Arrive $arrive
    ): ArriveResource {
        $this->authorize('update', $arrive);

        $validated = $request->validated();

        $arrive->update($validated);

        return new ArriveResource($arrive);
    }

    public function destroy(Request $request, Arrive $arrive): Response
    {
        $this->authorize('delete', $arrive);

        $arrive->delete();

        return response()->noContent();
    }
}