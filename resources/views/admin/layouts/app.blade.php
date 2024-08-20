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
    <link href="{{ asset('admin/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/nouislider/nouislider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- Style css -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"> --}}
    @stack('plugin-styles')
    @stack('custom-style')
</head>

<body>
    @include('admin.layouts.loading')

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        @include('admin.layouts.nav_header')
        @include('admin.layouts.chatbox')
        @include('admin.layouts.header')
        @include('admin.layouts.sidebar')

        <main>
            @yield('content')
            @include('admin.layouts.footer')
        </main>

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('admin/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin/js/dlabnav-init.js') }}"></script>
    {{-- <script src="{{ asset('admin/js/init/modal-init.js') }}"></script> --}}
    <script src="{{ asset('admin/js/sweetalert.js') }}"></script>
    @stack('plugin-scripts')
    @stack('custom-scripts')
</body>

</html>
