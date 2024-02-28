@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('addresses.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.addresses.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.addresses.inputs.user_id')</h5>
                    <span>{{ optional($address->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.addresses.inputs.address')</h5>
                    <span>{{ $address->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.addresses.inputs.street')</h5>
                    <span>{{ $address->street ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.addresses.inputs.city')</h5>
                    <span>{{ $address->city ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.addresses.inputs.district')</h5>
                    <span>{{ $address->district ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('addresses.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Address::class)
                <a href="{{ route('addresses.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
