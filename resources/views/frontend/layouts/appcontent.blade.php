<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') - UPTD LABBK Sumsel</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link href="{{ asset('storage/identities/' . $identity_website->icon) }}" rel="shortcut icon" type="image/png" />
    <!-- CSS
    ============================================ -->

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/fontawesome6/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/fontawesome6/css/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/icofont.min.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins/aos.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">


    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <!-- <link rel="stylesheet" href="frontend/css/vendor/plugins.min.css">
    <link rel="stylesheet" href="frontend/css/style.min.css"> -->
    @yield('style')
</head>

<body>
    <div class="main-wrapper">
        <!-- Header Section Start -->
        <div class="section header-section">
            @include('frontend.layouts.header')
            @include('frontend.layouts.navbar')
        </div>
        <!-- Header Section End -->

        @include('frontend.layouts.navmobile')

        <div class="section slider-section section-padding-03">
            <div class="container">
                <div class="row">
                    <div class="blog-wrapper col-md-8">
                        @yield('content')
                    </div>
                    <div class="col-md-4">
                        @include('frontend.layouts.sidecontent')
                    </div>
                </div>
            </div>
        </div>

        @include('frontend.layouts.footer')

        <!--Back To Start-->
        <a href="#" class="back-to-top">
            <i class="icofont-simple-up"></i>
        </a>
        <!--Back To End-->

    </div>

    <!-- JS
    ============================================ -->

    <!-- Modernizer & jQuery JS -->
    <script src="{{ asset('frontend/js/vendor/modernizr-3.11.2.min.js') }}"></script>
    <script src="{{ asset('frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/bootstrap.min.js') }}"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('frontend/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/ajax-contact.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins/aos.js') }}"></script>

    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <!-- <script src="{{ asset('frontend/js/plugins.min.js') }}"></script> -->


    <!-- Main JS -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    {{-- <script src="{{ asset('frontend/js/voice.js') }}"></script> --}}

    @yield('script')

</body>

</html>
