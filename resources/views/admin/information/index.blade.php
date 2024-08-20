@extends('admin.layouts.app')
@push('plugin-styles')
@endpush
@push('custom-style')
@endpush
@if ($page == 'performance_agreement')
    @section('title-website', __('main.performance_agreement'))
    @section('title-content', __('main.performance_agreement'))
@elseif($page == 'key_performance_indicators')
    @section('title-website', __('main.key_performance_indicators'))
    @section('title-content', __('main.key_performance_indicators'))
@elseif($page == 'annual_performance_plan')
    @section('title-website', __('main.annual_performance_plan'))
    @section('title-content', __('main.annual_performance_plan'))
@elseif($page == 'strategic_plan')
    @section('title-website', __('main.strategic_plan'))
    @section('title-content', __('main.strategic_plan'))
@elseif($page == 'sakip')
    @section('title-website', __('main.sakip_information'))
    @section('title-content', __('main.sakip_information'))
@elseif($page == 'all_times')
    @section('title-website', __('main.anytime_information'))
    @section('title-content', __('main.anytime_information'))
@elseif($page == 'periodically')
    @section('title-website', __('main.periodic_information'))
    @section('title-content', __('main.periodic_information'))
@elseif($page == 'necessarily')
    @section('title-website', __('main.immediate_information'))
    @section('title-content', __('main.immediate_information'))
@endif
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row d-flex justify-content-between page-titles gap-3 gap-xl-0">
                <div class="col-xl-6 col-xxl-6">

                </div>
                <div class="col-xl-6 col-xxl-6 d-flex justify-content-center justify-content-md-end mt-xl-0">
                    <button type="button" class="btn btn-primary btn-sm create">{{ __('main.create_information') }}</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="dataTable">
                            <thead>
                                <tr>
                                    <th><strong>{{ __('main.no') }}</strong></th>
                                    <th><strong>{{ __('main.name') }}</strong></th>
                                    <th><strong>{{ __('main.file') }}</strong></th>
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
    @include('admin.information.modal_cu')

@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
    <script src="{{ asset('admin/js/data-table/information.js?v=' . time()) }}"></script>
@endpush
