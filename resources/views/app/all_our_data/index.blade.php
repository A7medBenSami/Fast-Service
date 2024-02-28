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
            {{-- <div class="col-md-6 text-right">
                @can('create', App\Models\OurData::class)
                <a
                    href="{{ route('all-our-data.create') }}"
                    class="btn btn-primary"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div> --}}
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: space-between;">
                <h4 class="card-title">
                    @lang('crud.all_our_data.index_title')
                </h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.all_our_data.inputs.about_us')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_our_data.inputs.privacy_policy')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_our_data.inputs.address')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_our_data.inputs.phone')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_our_data.inputs.email')
                            </th>
                            <th class="text-left">
                                @lang('crud.all_our_data.inputs.help_and_support')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($allOurData as $ourData)
                        <tr>
                            <td>{{ $ourData->about_us ?? '-' }}</td>
                            <td>{{ $ourData->privacy_policy ?? '-' }}</td>
                            <td>{{ $ourData->address ?? '-' }}</td>
                            <td>{{ $ourData->phone ?? '-' }}</td>
                            <td>{{ $ourData->email ?? '-' }}</td>
                            <td>{{ $ourData->help_and_support ?? '-' }}</td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $ourData)
                                    <a
                                        href="{{ route('all-our-data.edit', $ourData) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $ourData)
                                    <a
                                        href="{{ route('all-our-data.show', $ourData) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="bi bi-eye-fill"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $ourData)
                                    <form
                                        action="{{ route('all-our-data.destroy', $ourData) }}"
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
                            <td colspan="7">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">{!! $allOurData->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
