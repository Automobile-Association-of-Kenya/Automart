<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | AA Kenya Limited</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-submenu.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons/style.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.mCustomScrollbar.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lightbox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jnoty.css') }}">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('css/skins/yellow.css') }}">
    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
    <meta name="google-signin-client_id" content=".apps.googleusercontent.com">

    <!-- Favicon icon -->
    {{-- <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" > --}}
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" />
    <!-- Google fonts -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/some.css') }}">
    @yield('header_styles')

</head>

<body>
    <header class="main-header sticky-header sh-2">
        @include('layouts.header')
    </header>
    @include('sidebar')

    @yield('main')

    @include('layouts.footer')

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('js/components.js') }}"></script> --}}
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-submenu.js') }}"></script>
    <script src="{{ asset('js/rangeslider.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery.filterizr.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery.countdown.js') }}"></script> --}}
    <script src="{{ asset('js/rangeslider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ asset('js/lightgallery-all.js') }}"></script>
    <script src="{{ asset('js/jnoty.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/iziToast.min.js') }}"></script>
    {{-- <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('footer_scripts')

</body>

</html>
