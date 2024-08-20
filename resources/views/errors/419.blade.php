@extends('admin.layouts.app_error')

@section('content')
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-7">
                    <div class="form-input-content text-center error-page">
                        <h1 class="error-text fw-bold">419</h1>
                        <h4><i class="fa fa-exclamation-triangle text-warning"></i> {{ __('error.text_page_expired') }}</h4>
                        <p>{{ __('error.dsc_page_expired') }}</p>
                        <div>
                            <a class="btn btn-primary" href="{{ route('dashboard.index') }}">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
