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
                @can('create', App\Models\Profile::class)
                <a
                    href="{{ route('profiles.create') }}"
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
                <h4 class="card-title">@lang('crud.profiles.index_title')</h4>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th class="text-left">
                                @lang('crud.profiles.inputs.user_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.profiles.inputs.captain_id')
                            </th>
                            <th class="text-left">
                                @lang('crud.profiles.inputs.full_name')
                            </th>
                            <th class="text-left">
                                @lang('crud.profiles.inputs.email')
                            </th>
                            <th class="text-left">
                                @lang('crud.profiles.inputs.street')
                            </th>
                            <th class="text-left">
                                @lang('crud.profiles.inputs.city')
                            </th>
                            <th class="text-left">
                                @lang('crud.profiles.inputs.district')
                            </th>
                            <th class="text-left">
                                @lang('crud.profiles.inputs.image')
                            </th>
                            <th class="text-center">
                                @lang('crud.common.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($profiles as $profile)
                        <tr>
                            <td>{{ optional($profile->user)->name ?? '-' }}</td>
                            <td>
                                {{ optional($profile->captain)->name ?? '-' }}
                            </td>
                            <td>{{ $profile->full_name ?? '-' }}</td>
                            <td>{{ $profile->email ?? '-' }}</td>
                            <td>{{ $profile->street ?? '-' }}</td>
                            <td>{{ $profile->city ?? '-' }}</td>
                            <td>{{ $profile->district ?? '-' }}</td>
                            <td>
                                <x-partials.thumbnail
                                    src="{{ $profile->image ? \Storage::url($profile->image) : '' }}"
                                />
                            </td>
                            <td class="text-center" style="width: 134px;">
                                <div
                                    role="group"
                                    aria-label="Row Actions"
                                    class="btn-group"
                                >
                                    @can('update', $profile)
                                    <a
                                        href="{{ route('profiles.edit', $profile) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                    </a>
                                    @endcan @can('view', $profile)
                                    <a
                                        href="{{ route('profiles.show', $profile) }}"
                                    >
                                        <button
                                            type="button"
                                            class="btn btn-light"
                                        >
                                             <i class="bi bi-eye-fill"></i>
                                        </button>
                                    </a>
                                    @endcan @can('delete', $profile)
                                    <form
                                        action="{{ route('profiles.destroy', $profile) }}"
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
                            <td colspan="9">
                                @lang('crud.common.no_items_found')
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9">{!! $profiles->render() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
