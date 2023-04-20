<!DOCTYPE html>
<html lang="zxx">


<head>
    <title>@yield('title') | AAKenya</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap-submenu.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/fonts/linearicons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/lightbox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/jnoty.css') }}">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ url('assets/css/skins/yellow.css') }}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
</head>

<body>


    <header class="top-header bg-active" id="top-header-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-7">
                    <div class="list-inline">
                        <a href="tel:+254709933999"><i class="fa fa-phone"></i>Need Support? +254709933999</a>
                        <a href="tel:customercare@aakenya.co.ke"><i
                                class="fa fa-envelope"></i>customercare@aakenya.co.ke</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-5">
                    <ul class="top-social-media pull-right">
                        @auth
                            <li>
                                <a href="{{ route('dealer.home') }}" class="sign-in"><i class="fa fa-user"></i>
                                    {{ auth()->user()->name }}</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}" class="sign-in"><i class="fa fa-sign-in"></i> Login</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" class="sign-in"><i class="fa fa-user"></i> Register</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- Main header start -->

    <header class="main-header sticky-header sh-2 bg-main">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand company-logo-2" href="{{ url('/') }}">
                    {{-- <img src="{{ asset('images/logo.png') }}" alt="logo"> --}}
                    <h1 class="text-white"> Automart | AAKenya</h1>
                </a>
                <button class="navbar-toggler" type="button" id="drawer">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="navbar-collapse collapse w-100 justify-content-end" id="navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link text-white" href="{{ url('/') }}" id="navbarDropdownMenuLink"
                                aria-haspopup="true" aria-expanded="false">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('all_cars') }}" aria-haspopup="true"
                                aria-expanded="false">
                                Car Listing
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('about') }}" aria-haspopup="true"
                                aria-expanded="false">
                                About us
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('contact') }}">Contact</a>
                        </li>

                        @guest
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link text-white">
                                    Register
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link text-white">
                                    Login
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('dealer.home') }}" class="nav-link text-white">
                                    {{ auth()->user()->name }}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link text-white">
                                    Logout
                                </a>
                            </li>
                        @endguest

                    </ul>
                </div>
            </nav>
        </div>
    </header>



    <!-- Sidenav start -->
    <nav id="sidebar" class="nav-sidebar">
        <!-- Close btn-->
        <div id="dismiss">
            <i class="fa fa-close"></i>
        </div>
        <div class="sidebar-inner">

            <div class="sidebar-logo">
                <a href="{{ url('/') }}">
                    <h1> Automart | AAKenya</h1>
                </a>
            </div>

            <div class="sidebar-navigation">
                <h3 class="heading">Pages</h3>
                <ul class="menu-list">
                    <li><a href="{{ url('/') }}" class="active pt0">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('all_cars') }}">Car Listing </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">About us </a>
                    </li>

                    <li>
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>

                    @guest
                            <li>
                                <a href="{{ route('register') }}">
                                    Register
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('login') }}">
                                    Login
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('dealer.home') }}">
                                    {{ auth()->user()->name }}
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('logout') }}">
                                    Logout
                                </a>
                            </li>
                        @endguest
                </ul>
            </div>
            <div class="get-in-touch">
                <h3 class="heading">Get in Touch</h3>
                <div class="get-in-touch-box d-flex mb-2">
                    <i class="flaticon-phone"></i>
                    <a href="tel:+254709933999">+254709933999</a>
                </div>
                <div class="get-in-touch-box d-flex mb-2">
                    <i class="flaticon-mail"></i>
                    <div class="media-body">
                        <a href="mail:customercare@aakenya.co.ke">customercare@aakenya.co.ke</a>
                    </div>
                </div>
                <div class="get-in-touch-box d-flex">
                    <i class="flaticon-earth"></i>
                    <div class="media-body">
                        <a href="mail:customeradvocate@aakenya.co.ke">customeradvocate@aakenya.co.ke</a>
                    </div>
                </div>
            </div>
            <div class="get-social">
                <h3 class="heading">Get Social</h3>
                <a href="#" class="facebook-bg">
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="#" class="twitter-bg">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="#" class="google-bg">
                    <i class="fa fa-google"></i>
                </a>
                <a href="#" class="linkedin-bg">
                    <i class="fa fa-linkedin"></i>
                </a>
            </div>
        </div>
    </nav>

    @yield('content')



    <!-- Footer start -->
    <footer class="main-footer-2" style="background: #CBBC27;max-height: 20%">
        <div class="container2">
            <div class="row">
                <div class="col-lg-3">
                    <img src="{{ url('images/iphone.png') }}" alt="iphone"> <br>
                    <img src="{{ url('images/playstore.png') }}" alt="iphone">
                </div>
                <div class="col-lg-3">
                    <h1 style="color: #00472F;font-size:400%">DOWNLOAD </h1>
                    <p style="color: #00472F">Automart APP on Google Play & App Store</p>
                </div>
                <div class="col-lg-3">

                </div>
                <div class="col-lg-3">
                    <h2 style="color: #00472F">
                        Automart powered by <br>
                        Automobile Association of Kenya
                    </h2>
                </div>
            </div>
        </div>

    </footer>
    <!-- Footer end -->

    <!-- Full Page Search -->
    <div id="full-page-search">
        <button type="button" class="close">×</button>
        <form
            action="https://storage.googleapis.com/theme-vessel-items/checking-sites/autocar-2-html/HTML/main/index.html#"
            class="full-page-search-inner">
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-sm button-theme">Search</button>
        </form>
    </div>

    <!-- Car Overview Modal -->
    <div class="car-model-2">
        <div class="modal fade" id="carOverviewModal" tabindex="-1" role="dialog"
            aria-labelledby="carOverviewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" id="vehiclePreviewModel">

            </div>
        </div>
    </div>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap-submenu.js') }}"></script>
    <script src="{{ url('assets/js/rangeslider.js') }}"></script>
    <script src="{{ url('assets/js/jquery.mb.YTPlayer.js') }}"></script>
    <script src="{{ url('assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ url('assets/js/jquery.scrollUp.js') }}"></script>
    <script src="{{ url('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ url('assets/js/dropzone.js') }}"></script>
    <script src="{{ url('assets/js/slick.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.filterizr.js') }}"></script>
    <script src="{{ url('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.countdown.js') }}"></script>
    <script src="{{ url('assets/js/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ url('assets/js/lightgallery-all.js') }}"></script>
    <script src="{{ url('assets/js/jnoty.js') }}"></script>
    <script src="{{ url('assets/js/sidebar.js') }}"></script>
    <script src="{{ url('assets/js/app.js') }}"></script>


    @yield('footer_scripts')
</body>

</html>
