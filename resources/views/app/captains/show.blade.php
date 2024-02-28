@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('captains.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.captains.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.captains.inputs.name')</h5>
                    <span>{{ $captain->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.captains.inputs.email')</h5>
                    <span>{{ $captain->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.captains.inputs.address')</h5>
                    <span>{{ $captain->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.captains.inputs.vehicle_number')</h5>
                    <span>{{ $captain->vehicle_number ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.captains.inputs.license_image')</h5>
                    <span>{{ $captain->license_image ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.captains.inputs.vehicle_catalog_image')</h5>
                    <span>{{ $captain->vehicle_catalog_image ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>
                        @lang('crud.captains.inputs.birth_certificate_image')
                    </h5>
                    <span>{{ $captain->birth_certificate_image ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.captains.inputs.status')</h5>
                    <span>{{ $captain->status ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.captains.inputs.lat')</h5>
                    <span>{{ $captain->lat ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.captains.inputs.long')</h5>
                    <span>{{ $captain->long ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.captains.inputs.vehicle_id')</h5>
                    <span>{{ optional($captain->vehicle)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.captains.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $captain->image ? \Storage::url($captain->image) : '' }}"
                        size="150"
                    />
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.captains.inputs.phone')</h5>
                    <span>{{ $captain->phone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.captains.inputs.otp')</h5>
                    <span>{{ $captain->otp ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.captains.inputs.isVerified')</h5>
                    <span>{{ $captain->isVerified ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('captains.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Captain::class)
                <a href="{{ route('captains.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
