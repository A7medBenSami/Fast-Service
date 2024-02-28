@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('profiles.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.profiles.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.profiles.inputs.user_id')</h5>
                    <span>{{ optional($profile->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.profiles.inputs.captain_id')</h5>
                    <span>{{ optional($profile->captain)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.profiles.inputs.full_name')</h5>
                    <span>{{ $profile->full_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.profiles.inputs.email')</h5>
                    <span>{{ $profile->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.profiles.inputs.street')</h5>
                    <span>{{ $profile->street ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.profiles.inputs.city')</h5>
                    <span>{{ $profile->city ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.profiles.inputs.district')</h5>
                    <span>{{ $profile->district ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.profiles.inputs.image')</h5>
                    <x-partials.thumbnail
                        src="{{ $profile->image ? \Storage::url($profile->image) : '' }}"
                        size="150"
                    />
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('profiles.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Profile::class)
                <a href="{{ route('profiles.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
