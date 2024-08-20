@extends('admin.layouts.app')
@push('custom-style')
@endpush
@section('title-website', __('main.news_categry'))
@section('title-content', __('main.news_categry'))
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row d-flex justify-content-between page-titles gap-3 gap-xl-0">
                <div class="col-xl-6 col-xxl-6">

                </div>
                <div class="col-xl-6 col-xxl-6 d-flex justify-content-center justify-content-md-end mt-xl-0">
                    <button type="button" class="btn btn-primary btn-sm create">{{ __('main.create_news_categry') }}</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md" id="tblCategory">
                            <thead>
                                <tr>
                                    <th><strong>{{ __('main.no') }}</strong></th>
                                    <th><strong>{{ __('main.name') }}</strong></th>
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
    @include('admin.news.modal_cu_category')
@endsection

@push('custom-scripts')
    <script src="{{ asset('admin/js/data-table/tags.js') }}"></script>
@endpush
