@extends('layouts.app')

@section('content')
<div class="container">
    <div class="searchbar mt-0 mb-4">
        <div class="row">
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input
                            id="indexSearch"
                            type="text"
                            name="search"
                            placeholder="{{ __('crud.common.search') }}"
                            value="{{ $search ?? '' }}"
                            class="form-control"
                            autocomplete="off"
                        />
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                 <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                @can('create', App\Models\Shipment::class)
                <a
                    href="{{ route('shipments.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.shipments.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.shipments.inputs.date')
                            </th>
                            <th class="text-left">
                                @lang('crud.shipments.inputs.captain_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.shipments.inputs.user_id')
                            </th>
                            <th class="text-right">
                                @lang('crud.shipments.inputs.from_lat')
                            </th>
                            <th class="text-right">
                                @lang('crud.shipments.inputs.from_long')
                            </th>
                            <th class="text-right">
                                @lang('crud.shipments.inputs.to_lat')
                            </th>
                            <th class="text-right">
                                @lang('crud.shipments.inputs.to_long')
                            </th>
                            <th class="text-left">
                                @lang('crud.shipments.inputs.description')
                            </th>
                            <th class="text-right">
                                @lang('crud.shipments.inputs.cost')
                            </th>
                            <th class="text-left">
                                @lang('crud.shipments.inputs.status')
                            </th>
                            <th class="text-left">
                                @lang('crud.shipments.inputs.category_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.shipments.inputs.vehicle_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.shipments.inputs.address')
                            </th>
                            <th class="text-left">
                                @lang('crud.shipments.inputs.address_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.shipments.inputs.receiver_data_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.shipments.inputs.location_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.shipments.inputs.sender_data_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($shipments as $shipment)
                        <tr>
                            <td>{{ $shipment->date ?? '-' }}</td>
                            <td>
                                {{ optional($shipment->captain)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($shipment->user)->name ?? '-' }}
                            </td>
                            <td>{{ $shipment->from_lat ?? '-' }}</td>
                            <td>{{ $shipment->from_long ?? '-' }}</td>
                            <td>{{ $shipment->to_lat ?? '-' }}</td>
                            <td>{{ $shipment->to_long ?? '-' }}</td>
                            <td>{{ $shipment->description ?? '-' }}</td>
                            <td>{{ $shipment->cost ?? '-' }}</td>
                            <td>{{ $shipment->status ?? '-' }}</td>
                            <td>
                                {{ optional($shipment->category)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($shipment->vehicle)->name ?? '-' }}
                            </td>
                            <td>{{ $shipment->address ?? '-' }}</td>
                            <td>
                                {{ optional($shipment->address)->address ?? '-'
                                }}
                            </td>
                            <td>
                                {{ optional($shipment->receiverData)->name ??
                                '-' }}
                            </td>
                            <td>
                                {{ optional($shipment->location)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($shipment->senderData)->name ?? '-'
                                }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $shipment)
                                    <a
                                        href="{{ route('shipments.edit', $shipment) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $shipment)
                                    <a
                                        href="{{ route('shipments.show', $shipment) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                             <i class="bi bi-eye-fill"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $shipment)
                                    <form
                                        action="{{ route('shipments.destroy', $shipment) }}"
                                        method="POST"
                                        onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                    >
                                        @csrf @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-light text-danger"
                                        >
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="18">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="18">{!! $shipments->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
