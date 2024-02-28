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
                @can('create', App\Models\Captain::class)
                <a
                    href="{{ route('captains.create') }}"
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
                <h4 class="card-title">@lang('crud.captains.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.captains.inputs.name')
                            </th>
                            <th class="text-left">
                                @lang('crud.captains.inputs.email')
                            </th>
                            <th class="text-left">
                                @lang('crud.captains.inputs.address')
                            </th>
                            <th class="text-left">
                                @lang('crud.captains.inputs.vehicle_number')
                            </th>
                            <th class="text-left">
                                @lang('crud.captains.inputs.status')
                            </th>
                            {{-- <th class="text-right">
                                @lang('crud.captains.inputs.lat')
                            </th>
                            <th class="text-right">
                                @lang('crud.captains.inputs.long')
                            </th> --}}
                            <th class="text-left">
                                @lang('crud.captains.inputs.vehicle_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.captains.inputs.image')
                            </th>
                            <th class="text-left">
                                @lang('crud.captains.inputs.phone')
                            </th>
                            <th class="text-left">
                                @lang('crud.captains.inputs.otp')
                            </th>
                            <th class="text-right">
                                @lang('crud.captains.inputs.isVerified')
                            </th>
                            <th class="text-left">
                                @lang('crud.captains.inputs.gender')
                            </th>
                            <th class="text-right">
                                @lang('crud.captains.inputs.Discount Percentage')
                            </th>
                            {{-- <th class="text-left">
                                @lang('crud.captains.inputs.license_image')
                            </th>
                            <th class="text-left">
                                @lang('crud.captains.inputs.vehicle_catalog_image')
                            </th>
                            <th class="text-left">
                                @lang('crud.captains.inputs.birth_certificate_image')
                            </th> --}}
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($captains as $captain)
                        <tr>
                            <td>{{ $captain->name ?? '-' }}</td>
                            <td>{{ $captain->email ?? '-' }}</td>
                            <td>{{ $captain->address ?? '-' }}</td>
                            <td>{{ $captain->vehicle_number ?? '-' }}</td>
                            <td>{{ $captain->status ?? '-' }}</td>
                            {{-- <td>{{ $captain->lat ?? '-' }}</td>
                            <td>{{ $captain->long ?? '-' }}</td> --}}
                            <td>
                                {{ optional($captain->vehicle)->name ?? '-' }}
                            </td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $captain->image ? \Storage::url($captain->image) : '' }}"
                                />
                            </td>
                            <td>{{ $captain->phone ?? '-' }}</td>
                            <td>{{ $captain->otp ?? '-' }}</td>
                            <td class="text-right">{{ $captain->isVerified == 1 ? 'Yes' : 'No' }}</td>
                            <td>{{ $captain->gender ?? '-' }}</td>
                            <td>{{ $captain->dis_percentage ?? '-' }}%</td>
                            {{-- <td>
                                <x-partials.thumbnail
                                    src="{{ $captain->license_image ? \Storage::url($captain->license_image) : '' }}"
                                />
                            </td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $captain->vehicle_catalog_image ? \Storage::url($captain->vehicle_catalog_image) : '' }}"
                                />
                            </td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $captain->birth_certificate_image ? \Storage::url($captain->birth_certificate_image) : '' }}"
                                />
                            </td> --}}
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $captain)
                                    <a
                                        href="{{ route('captains.edit', $captain) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $captain)
                                    <a
                                        href="{{ route('captains.show', $captain) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="bi bi-eye-fill"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $captain)
                                    <form
                                        action="{{ route('captains.destroy', $captain) }}"
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
                            <td colspan="18">{!! $captains->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
