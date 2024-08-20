@extends('admin.layouts.guest')
@section('title-website', __('auth.login'))
@section('content')
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-4">
                                        <a href="javascript:;" class="brand-logo">
                                            {{-- <img class="logo-abbr" src="{{ asset('images/logo.svg') }}" alt=""
                                                width="20%" /> --}}
                                            <img class="brand-abbr"
                                                src="{{ asset('storage/identities/' . $identity_website->logo) }}"
                                                alt="" width="100%" />
                                        </a>
                                    </div>
                                    <h6 class="text-center text-muted mb-4">{{ __('auth.text_sign') }}</h6>
                                    @if ($errors->any())
                                        <div class="alert alert-danger modal-error" role="alert">
                                            @if ($errors->has('email'))
                                                <div>{{ $errors->first('email') }}</div>
                                            @endif
                                            @if ($errors->has('password'))
                                                <div>{{ $errors->first('password') }}</div>
                                            @endif
                                            @if ($errors->has('g-recaptcha-response'))
                                                <div>{{ $errors->first('g-recaptcha-response') }}</div>
                                            @endif
                                        </div>
                                    @endif
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger modal-error" role="alert">
                                            <div>{{ session('error') }}</div>
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>{{ __('auth.lbl_email') }}</strong></label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ old('email') }}" placeholder="superadmin@gmail.com">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>{{ __('auth.lbl_password') }}</strong></label>
                                            <div class="input-group">
                                                <input id="password" class="form-control" name="password" type="password"
                                                    placeholder="......">
                                                <a href="javascript:;" class="input-group-text hide"><i id="eye"
                                                        class='fa fa-eye-slash'></i></a>
                                            </div>
                                        </div>
                                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                                <div class="form-check custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input" id="remember"
                                                        name="remember" role="button">
                                                    <label class="form-check-label" for="remember"
                                                        role="button">{{ __('auth.remember_me') }}</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <a
                                                    href="{{ route('password.request') }}">{{ __('auth.forgot_password') }}</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block"
                                                onclick="onClick(event)">{{ __('auth.login') }}</button>
                                            {{-- <button type="submit" class="g-recaptcha btn btn-primary btn-block"
                                                data-sitekey="{{ config('services.recaptcha.site_key') }}"
                                                data-callback='onSubmit' data-action='login'
                                                onclick="onClick(event)">{{ __('auth.login') }}</button> --}}
                                        </div>
                                    </form>
                                    {{-- <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary"
                                                href="{{ route('register') }}">Sign
                                                up</a></p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        function onClick(e) {
            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute("{{ config('services.recaptcha.site_key') }}", {
                    action: 'login'
                }).then(function(token) {
                    document.getElementById("g-recaptcha-response").value = token;
                    document.getElementById("loginForm").submit();
                });
            });
        }
    </script>
@endpush
