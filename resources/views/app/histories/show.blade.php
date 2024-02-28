@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('histories.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.histories.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.histories.inputs.date')</h5>
                    <span>{{ $history->date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.histories.inputs.vehicle')</h5>
                    <span>{{ $history->vehicle ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.histories.inputs.user_id')</h5>
                    <span>{{ $history->user_id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.histories.inputs.captain_id')</h5>
                    <span>{{ $history->captain_id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.histories.inputs.from_lat')</h5>
                    <span>{{ $history->from_lat ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.histories.inputs.from_long')</h5>
                    <span>{{ $history->from_long ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.histories.inputs.to_lat')</h5>
                    <span>{{ $history->to_lat ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.histories.inputs.to_long')</h5>
                    <span>{{ $history->to_long ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.histories.inputs.status')</h5>
                    <span>{{ $history->status ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('histories.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\History::class)
                <a href="{{ route('histories.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
