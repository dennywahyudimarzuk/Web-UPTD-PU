@extends('admin.layouts.app')
@push('plugin-styles')
@endpush
@push('custom-style')
@endpush
@section('title-website', __('main.agenda'))
@section('title-content', __('main.agenda'))
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row d-flex justify-content-between page-titles gap-3 gap-xl-0">
                <div class="col-xl-6 col-xxl-6">

                </div>
                <div class="col-xl-6 col-xxl-6 d-flex justify-content-center justify-content-md-end mt-xl-0">
                    <button type="button" class="btn btn-primary btn-sm create">{{ __('main.create_gallery') }}</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="dataTable">
                            <thead>
                                <tr>
                                    <th><strong>{{ __('main.no') }}</strong></th>
                                    <th><strong>{{ __('main.time') }}</strong></th>
                                    <th><strong>{{ __('main.title') }}</strong></th>
                                    <th><strong>{{ __('main.status') }}</strong></th>
                                    <th><strong>{{ __('main.action') }}</strong></th>
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
    @include('admin.agenda.modal_cu')

@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
    <script src="{{ asset('admin/js/data-table/agenda.js?v=' . time()) }}"></script>
@endpush
