@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('arrives.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.arrives.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.arrives.inputs.date')</h5>
                    <span>{{ $arrive->date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.arrives.inputs.user_id')</h5>
                    <span>{{ optional($arrive->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.arrives.inputs.captain_id')</h5>
                    <span>{{ optional($arrive->captain)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.arrives.inputs.from_at')</h5>
                    <span>{{ $arrive->from_at ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.arrives.inputs.from_long')</h5>
                    <span>{{ $arrive->from_long ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.arrives.inputs.to_lat')</h5>
                    <span>{{ $arrive->to_lat ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.arrives.inputs.to_long')</h5>
                    <span>{{ $arrive->to_long ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.arrives.inputs.note')</h5>
                    <span>{{ $arrive->note ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.arrives.inputs.cost')</h5>
                    <span>{{ $arrive->cost ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.arrives.inputs.status')</h5>
                    <span>{{ $arrive->status ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.arrives.inputs.vehicle_id')</h5>
                    <span>{{ optional($arrive->vehicle)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.arrives.inputs.address')</h5>
                    <span>{{ $arrive->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.arrives.inputs.location_id')</h5>
                    <span>{{ optional($arrive->location)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.arrives.inputs.address_id')</h5>
                    <span
                        >{{ optional($arrive->address)->address ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('arrives.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Arrive::class)
                <a href="{{ route('arrives.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
