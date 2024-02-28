@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('locations.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.locations.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.locations.inputs.name')</h5>
                    <span>{{ $location->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.locations.inputs.price')</h5>
                    <span>{{ $location->price ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('locations.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Location::class)
                <a href="{{ route('locations.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
