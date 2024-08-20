<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="{{ asset('frontend') }}/{{ $identity_website->icon }}" rel="shortcut icon" type="image/png" /> --}}

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    @stack('custom-style')
</head>

<body class="vh-100">
    @yield('content')

    <script src="{{ asset('admin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin/js/init/passwordhide-init.js') }}"></script>
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin/js/dlabnav-init.js') }}"></script>
    @stack('custom-scripts')
</body>

</html>
