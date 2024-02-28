@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('all-receiver-data.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.receiver_data.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.receiver_data.inputs.name')</h5>
                    <span>{{ $receiverData->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.receiver_data.inputs.phone')</h5>
                    <span>{{ $receiverData->phone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.receiver_data.inputs.remarks')</h5>
                    <span>{{ $receiverData->remarks ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('all-receiver-data.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\ReceiverData::class)
                <a
                    href="{{ route('all-receiver-data.create') }}"
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
