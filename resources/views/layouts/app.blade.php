<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/autocar-html/HTML/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Apr 2023 11:27:23 GMT -->

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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lightbox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jnoty.css') }}">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('css/skins/yellow.css') }}">
    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">

    <!-- Favicon icon -->
    {{-- <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" > --}}
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" />
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/some.css') }}">
    @yield('header_styles')

</head>

<body>

    <header class="top-header bg-active" id="top-header-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-7">
                    <div class="list-inline">
                        <a href="tel:1-8X0-666-8X88"><i class="fa fa-phone"></i>Need Support? 1-8X0-666-8X88</a>
                        <a href="tel:info@themevessel.com"><i class="fa fa-envelope"></i>info@themevessel.com</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-5">
                    <ul class="top-social-media pull-right">
                        @auth
                            <li>
                                <a href="{{ route('dashboard') }}"><i
                                        class="fa fa-user"></i>&nbsp;&nbsp;{{ auth()->user()->name }}</a>
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
    <!-- Top header end -->

    <!-- Main header start -->
    <header class="main-header sticky-header sh-2">
        @include('layouts.header')
    </header>
    <!-- Main header end -->

    <!-- Sidenav start -->
    @include('sidebar')

    <!-- Sidenav end -->
    @yield('main')
    <!-- Footer start -->

    <footer class="footer">

        <div class="subscribe-newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h3>Subscribe Newsletter</h3>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="Subscribe-box">
                            <div class="newsletter-content-wrap">
                                <form class="newsletter-form d-flex" action="#">
                                    <input class="form-control" type="email" id="email"
                                        placeholder="Email Address...">
                                    <button class="btn btn-theme" type="submit"><i
                                            class="fa fa-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="footer-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-item clearfix">
                            <img src="{{ asset('images/logo.png') }}" alt="logo" class="f-logo">
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <div class="text">
                                <P class="mb-0">You are at the right place. Our platform offers a wide selection of
                                    vehicles from
                                    trusted dealers across the country, ensuring we match buyers with the perfect
                                    fit for their needs and budget. We also provide financing options to our clients
                                    to enable them acquire or sell their dream cars with ease. </P>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-item clearfix">
                            <h4>
                                Contact Info
                            </h4>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <ul class="contact-info">

                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-item">
                            <h4>
                                Useful Links
                            </h4>
                            <div class="s-border"></div>
                            <div class="m-border"></div>
                            <ul class="links">
                                <li>
                                    <a href="{{ url('/') }}"><i class="fa fa-angle-right"></i>Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}"><i class="fa fa-angle-right"></i>About Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('services.index') }}"><i
                                            class="fa fa-angle-right"></i>Services</a>
                                </li>
                                <li>
                                    <a href="{{ route('new') }}"><i class="fa fa-angle-right"></i>Vehicles</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}"><i class="fa fa-angle-right"></i>Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <p class="copy">© 2022 <a href="{{ url('/') }}">Automart AA Kenya Limited</a> All
                            Rights Reserved.
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="social-media clearfix">
                            <div class="social-list">
                                {{-- <div class="icon facebook">
                                    <div class="tooltip">Facebook</div>
                                    <span><i class="fa fa-facebook"></i></span>
                                </div>
                                <div class="icon twitter">
                                    <div class="tooltip">Twitter</div>
                                    <span><i class="fa fa-twitter"></i></span>
                                </div>
                                <div class="icon instagram">
                                    <div class="tooltip">Instagram</div>
                                    <span><i class="fa fa-instagram"></i></span>
                                </div>
                                <div class="icon github">
                                    <div class="tooltip">Github</div>
                                    <span><i class="fa fa-github"></i></span>
                                </div>
                                <div class="icon youtube mr-0">
                                    <div class="tooltip">Youtube</div>
                                    <span><i class="fa fa-youtube"></i></span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer end -->

    <!-- Full Page Search -->
    <div id="full-page-search">
        <button type="button" class="close">×</button>
        <form
            action="https://storage.googleapis.com/theme-vessel-items/checking-sites/autocar-html/HTML/main/index.html#"
            class="full-page-search-inner">
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-sm button-theme">Search</button>
        </form>
    </div>

    <!-- Car Overview Modal -->
    <div class="car-model-2">
        <div class="modal fade" id="carOverviewModal" tabindex="-1" role="dialog"
            aria-labelledby="carOverviewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" id="vehiclePreviewSection">

                </div>
            </div>
        </div>
    </div>

    {{-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('js/components.js') }}"></script>
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
    <script src="{{ asset('js/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ asset('js/lightgallery-all.js') }}"></script>
    <script src="{{ asset('js/jnoty.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/iziToast.min.js') }}"></script>

    @yield('footer_scripts')

</body>

</html>
