@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('shipments.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.shipments.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.shipments.inputs.date')</h5>
                    <span>{{ $shipment->date ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shipments.inputs.captain_id')</h5>
                    <span>{{ optional($shipment->captain)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shipments.inputs.user_id')</h5>
                    <span>{{ optional($shipment->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shipments.inputs.from_lat')</h5>
                    <span>{{ $shipment->from_lat ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shipments.inputs.from_long')</h5>
                    <span>{{ $shipment->from_long ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shipments.inputs.to_lat')</h5>
                    <span>{{ $shipment->to_lat ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shipments.inputs.to_long')</h5>
                    <span>{{ $shipment->to_long ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shipments.inputs.description')</h5>
                    <span>{{ $shipment->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shipments.inputs.cost')</h5>
                    <span>{{ $shipment->cost ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shipments.inputs.status')</h5>
                    <span>{{ $shipment->status ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shipments.inputs.category_id')</h5>
                    <span
                        >{{ optional($shipment->category)->name ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shipments.inputs.vehicle_id')</h5>
                    <span>{{ optional($shipment->vehicle)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shipments.inputs.address')</h5>
                    <span>{{ $shipment->address ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shipments.inputs.address_id')</h5>
                    <span
                        >{{ optional($shipment->address)->address ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shipments.inputs.receiver_data_id')</h5>
                    <span
                        >{{ optional($shipment->receiverData)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shipments.inputs.location_id')</h5>
                    <span
                        >{{ optional($shipment->location)->name ?? '-' }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.shipments.inputs.sender_data_id')</h5>
                    <span
                        >{{ optional($shipment->senderData)->name ?? '-'
                        }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('shipments.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Shipment::class)
                <a href="{{ route('shipments.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
