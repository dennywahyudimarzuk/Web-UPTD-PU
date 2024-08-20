<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="SIC : Sriwijaya Infotech Center" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- PAGE TITLE HERE -->
    <title>@yield('title-website', __('main.page')) - {{ config('app.name', 'Website-opd') }}</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('storage/identities/' . $identity_website->icon) }}" />

    <!-- Style css -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    @stack('custom-style')
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
</head>

<body class="vh-100">
    <!--**********************************
        Main wrapper start
    ***********************************-->
    @yield('content')
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin/js/init/passwordhide-init.js') }}"></script>
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin/js/dlabnav-init.js') }}"></script>
    @stack('custom-scripts')
</body>

</html>
