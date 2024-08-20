@extends('admin.layouts.app')
@push('custom-style')
@endpush
@section('title-website', __('main.menu'))
@section('title-content', __('main.menu'))
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row d-flex justify-content-between page-titles gap-3 gap-xl-0">
                <div class="col-xl-6 col-xxl-6">

                </div>
                <div class="col-xl-6 col-xxl-6 d-flex justify-content-center justify-content-md-end mt-xl-0">
                    <button type="button" class="btn btn-primary btn-sm create-menu">{{ __('main.create_menu') }}</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th><strong>{{ __('main.no') }}</strong></th>
                                    <th><strong>{{ __('main.name') }}</strong></th>
                                    <th><strong>{{ __('main.url') }}</strong></th>
                                    <th><strong>{{ __('main.order') }}</strong></th>
                                    <th><strong>{{ __('main.status') }}</strong></th>
                                    <th><strong>{{ __('main.action') }}</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $key=>$item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $item->name ?? '' }}
                                        </td>
                                        <td>{{ $item->url ?? '' }}</td>
                                        <td>{{ $item->order ?? '' }}</td>
                                        <td>
                                            @if ($item->active == 1)
                                                <button type="button" data-id="{{ Crypt::encrypt($item->id) }}"
                                                    data-status="0" class="badge bg-success border-0 status"
                                                    title="{{ __('main.change_to_inactive') }}"><span>{{ __('main.active') }}</span></button>
                                            @else
                                                <button type="button" data-id="{{ Crypt::encrypt($item->id) }}"
                                                    $data-status="1" class="badge bg-danger border-0 status"
                                                    title="{{ __('main.change_to_active') }}">
                                                    <span>{{ __('main.not_active') }}</span>
                                                </button>
                                            @endif

                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="javascript:void(0);" data-id="{{ Crypt::encrypt($item->id) }}"
                                                    title="{{ __('main.update_menu') }}" class="update-menu"><i
                                                        class="las la-edit text-warning la-2x"></i></a>
                                                <a href="javascript:void(0);" data-id="{{ Crypt::encrypt($item->id) }}"
                                                    title="{{ __('main.delete_menu') }}" class="delete-menu"><i
                                                        class="las la-trash-alt text-danger la-2x"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%">
                                            <p class="text-center">{{ __('main.menu_empty') }}</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.users.modal_cu')
@endsection

@push('custom-scripts')
    <script src="{{ asset('admin/js/init/passwordhide-init.js') }}"></script>
@endpush
