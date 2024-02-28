@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="searchbar mt-0 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <form>
                        <div class="input-group">
                            <input id="indexSearch" type="text" name="search" placeholder="{{ __('crud.common.search') }}"
                                value="{{ $search ?? '' }}" class="form-control" autocomplete="off" />
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-right">
                    @can('create', App\Models\Vehicle::class)
                        <a href="{{ route('vehicles.create') }}" class="btn btn-primary">
                            <i class="icon ion-md-add"></i> @lang('crud.common.create')
                        </a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div style="display: flex; justify-content: space-between;">
                    <h4 class="card-title">@lang('crud.vehicles.index_title')</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th class="text-left">
                                    @lang('crud.vehicles.inputs.name')
                                </th>
                                <th class="text-left">
                                    @lang('crud.vehicles.inputs.image')
                                </th>
                                <th class="text-right">
                                    @lang('crud.vehicles.inputs.price')
                                </th>
                                <th class="text-center">
                                    @lang('crud.common.actions')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($vehicles as $vehicle)
                                <tr>
                                    <td>{{ $vehicle->name ?? '-' }}</td>
                                    <td>
                                        <x-partials.thumbnail
                                            src="{{ $vehicle->image ? \Storage::url($vehicle->image) : '' }}" />
                                    </td>
                                    <td>{{ $vehicle->price ?? '-' }}</td>
                                    <td class="text-center" style="width: 134px;">
                                        <div role="group" aria-label="Row Actions" class="btn-group">
                                            @can('update', $vehicle)
                                                <a href="{{ route('vehicles.edit', $vehicle) }}">
                                                    <button type="button" class="btn btn-light">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </button>
                                                </a>
                                                @endcan @can('view', $vehicle)
                                                <a href="{{ route('vehicles.show', $vehicle) }}">
                                                    <button type="button" class="btn btn-light">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </button>
                                                </a>
                                                @endcan @can('delete', $vehicle)
                                                <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST"
                                                    onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-light ">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        @lang('crud.common.no_items_found')
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">{!! $vehicles->render() !!}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
