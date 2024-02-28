@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-our-data.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.all_our_data.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.all_our_data.inputs.about_us')</h5>
                    <span>{{ $ourData->about_us ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_our_data.inputs.privacy_policy')</h5>
                    <span>{{ $ourData->privacy_policy ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_our_data.inputs.address')</h5>
                    <span>{{ $ourData->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_our_data.inputs.phone')</h5>
                    <span>{{ $ourData->phone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_our_data.inputs.email')</h5>
                    <span>{{ $ourData->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.all_our_data.inputs.help_and_support')</h5>
                    <span>{{ $ourData->help_and_support ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-our-data.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\OurData::class)
                <a
                    href="{{ route('all-our-data.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
