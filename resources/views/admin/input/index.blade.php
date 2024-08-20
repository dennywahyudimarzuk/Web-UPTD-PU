@extends('admin.layouts.app')
@push('plugin-styles')
@endpush
@push('custom-style')
@endpush
@section('title-website', __('main.input'))
@section('title-content', __('main.input'))
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="dataTable">
                            <thead>
                                <tr>
                                    <th><strong>{{ __('main.no') }}</strong></th>
                                    <th><strong>{{ __('main.name') }}</strong></th>
                                    <th><strong>{{ __('main.number_phone') }}</strong></th>
                                    <th><strong>{{ __('main.email') }}</strong></th>
                                    <th><strong>{{ __('main.regarding') }}</strong></th>
                                    <th><strong>{{ __('main.information') }}</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.gallery.image.modal_cu')

@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
    <script src="{{ asset('admin/js/data-table/input.js?v=' . time()) }}"></script>
@endpush
