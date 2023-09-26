<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | AA Kenya Limited</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-submenu.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/slick.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> --}}

    <link rel="stylesheet" type="text/css"  href="{{ asset('css/lightbox.min.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/jnoty.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('css/skins/yellow.css') }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/some.css') }}">
    <script src="https://kit.fontawesome.com/4930f74824.js" crossorigin="anonymous"></script>

    @yield('header_styles')
</head>


<body>
<div id="fb-root"></div>

    <header class="main-header sticky-header sh-2">
        @include('layouts.header')
    </header>

    @include('sidebar')

    @yield('main')

    @include('layouts.footer')

    <div id="full-page-search">
        <button type="button" class="close">×</button>
        <form action="" class="full-page-search-inner">
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-sm button-theme">Search</button>
        </form>
    </div>

    <div class="car-model-2">
        <div class="modal fade" id="vehicleDetailsModal" tabindex="-1" role="dialog"
            aria-labelledby="carOverviewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" id="vehiclePreviewSection">

                </div>
            </div>
        </div>
    </div>

    @include('cookie-consent::index')

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script  src="{{ asset('js/bootstrap-submenu.js') }}"></script>
<script src="{{ asset('js/rangeslider.min.js') }}"></script>
<script  src="{{ asset('js/rangeslider.js') }}"></script>
<script  src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script  src="{{ asset('js/jquery.scrollUp.js') }}"></script>
<script  src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script  src="{{ asset('js/slick.min.js') }}"></script>
{{-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> --}}

<script  src="{{ asset('js/jquery.filterizr.js') }}"></script>
<script  src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script  src="{{ asset('js/jquery.countdown.js') }}"></script>
<script  src="{{ asset('js/jquery.mousewheel.min.js') }}"></script>
<script  src="{{ asset('js/lightgallery-all.js') }}"></script>
<script  src="{{ asset('js/jnoty.js') }}"></script>
<script  src="{{ asset('js/sidebar.js') }}"></script>
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script  src="{{ asset('js/app.js') }}"></script>

    @yield('footer_scripts')

</body>

</html>
