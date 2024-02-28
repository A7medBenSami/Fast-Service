<?php

namespace App\Http\Controllers\Api;

use App\Models\OurData;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\OurDataResource;
use App\Http\Resources\OurDataCollection;
use App\Http\Requests\OurDataStoreRequest;
use App\Http\Requests\OurDataUpdateRequest;

class OurDataController extends Controller
{
    public function index(Request $request): OurDataCollection
    {
        $this->authorize('view-any', OurData::class);

        $search = $request->get('search', '');

        $allOurData = OurData::search($search)
            ->latest()
            ->paginate();

        return new OurDataCollection($allOurData);
    }

    public function store(OurDataStoreRequest $request): OurDataResource
    {
        $this->authorize('create', OurData::class);

        $validated = $request->validated();

        $ourData = OurData::create($validated);

        return new OurDataResource($ourData);
    }

    public function show(Request $request, OurData $ourData): OurDataResource
    {
        $this->authorize('view', $ourData);

        return new OurDataResource($ourData);
    }

    public function update(
        OurDataUpdateRequest $request,
        OurData $ourData
    ): OurDataResource {
        $this->authorize('update', $ourData);

        $validated = $request->validated();

        $ourData->update($validated);

        return new OurDataResource($ourData);
    }

    public function destroy(Request $request, OurData $ourData): Response
    {
        $this->authorize('delete', $ourData);

        $ourData->delete();

        return response()->noContent();
    }
}
