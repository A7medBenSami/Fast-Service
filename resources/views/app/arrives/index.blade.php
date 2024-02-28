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
                @can('create', App\Models\Arrive::class)
                <a href="{{ route('arrives.create') }}" class="btn btn-primary">
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">@lang('crud.arrives.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.arrives.inputs.date')
                            </th>
                            <th class="text-left">
                                @lang('crud.arrives.inputs.user_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.arrives.inputs.captain_id')
                            </th>
                            <th class="text-right">
                                @lang('crud.arrives.inputs.from_at')
                            </th>
                            <th class="text-right">
                                @lang('crud.arrives.inputs.from_long')
                            </th>
                            <th class="text-right">
                                @lang('crud.arrives.inputs.to_lat')
                            </th>
                            <th class="text-right">
                                @lang('crud.arrives.inputs.to_long')
                            </th>
                            <th class="text-left">
                                @lang('crud.arrives.inputs.note')
                            </th>
                            <th class="text-right">
                                @lang('crud.arrives.inputs.cost')
                            </th>
                            <th class="text-left">
                                @lang('crud.arrives.inputs.status')
                            </th>
                            <th class="text-left">
                                @lang('crud.arrives.inputs.vehicle_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.arrives.inputs.address')
                            </th>
                            <th class="text-left">
                                @lang('crud.arrives.inputs.location_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.arrives.inputs.address_id')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($arrives as $arrive)
                        <tr>
                            <td>{{ $arrive->date ?? '-' }}</td>
                            <td>{{ optional($arrive->user)->name ?? '-' }}</td>
                            <td>
                                {{ optional($arrive->captain)->name ?? '-' }}
                            </td>
                            <td>{{ $arrive->from_at ?? '-' }}</td>
                            <td>{{ $arrive->from_long ?? '-' }}</td>
                            <td>{{ $arrive->to_lat ?? '-' }}</td>
                            <td>{{ $arrive->to_long ?? '-' }}</td>
                            <td>{{ $arrive->note ?? '-' }}</td>
                            <td>{{ $arrive->cost ?? '-' }}</td>
                            <td>{{ $arrive->status ?? '-' }}</td>
                            <td>
                                {{ optional($arrive->vehicle)->name ?? '-' }}
                            </td>
                            <td>{{ $arrive->address ?? '-' }}</td>
                            <td>
                                {{ optional($arrive->location)->name ?? '-' }}
                            </td>
                            <td>
                                {{ optional($arrive->address)->address ?? '-' }}
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $arrive)
                                    <a
                                        href="{{ route('arrives.edit', $arrive) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $arrive)
                                    <a
                                        href="{{ route('arrives.show', $arrive) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                             <i class="bi bi-eye-fill"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $arrive)
                                    <form
                                        action="{{ route('arrives.destroy', $arrive) }}"
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
                            <td colspan="15">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="15">{!! $arrives->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
