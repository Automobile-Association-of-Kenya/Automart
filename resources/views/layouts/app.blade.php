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
    <meta name="google-signin-client_id" content=".apps.googleusercontent.com">

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

    {{-- <header class="top-header bg-active" id="top-header-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-7">
                    <div class="list-inline" id="socialheader">
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
                                <a href="#" data-bs-toggle="modal" data-bs-target="#accountModal" class="sign-in"><i
                                        class="fa fa-sign-in"></i> Login / Register</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </header> --}}

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
                        <p class="copy">© 2023 <a href="{{ url('/') }}">Automart AA Kenya Limited</a> All
                            Rights Reserved.
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="social-media clearfix">
                            <div class="social-list">
                                
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
        <form action="" class="full-page-search-inner">
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-sm button-theme">Search</button>
        </form>
    </div>

    <div class="car-model-2">
        <div class="modal fade" id="vehicleDetailsModalToggle" tabindex="-1" role="dialog"
            aria-labelledby="carOverviewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" id="vehiclePreviewSection">

                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-labelledby="financeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content" id="vehiclePreviewSection">
                <div class="modal-header">
                    <div class="modal-title" id="subscriptionOverviewModalLabel">
                        <p><b>Enjoy great advertising experience on our platform</b></p>
                    </div>
                    <button type="button" class="close btn btn-warning text-danger" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body tab-content">

                    <nav class="nav-justified bg-white">
                        <div class="nav nav-tabs " id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="pop1-tab" data-toggle="tab" href="#loginTab"
                                role="tab" data-target="#loginTab" aria-controls="pop1"
                                aria-selected="true">Sign
                                in</a>
                            <a class="nav-item nav-link" id="signup" data-toggle="tab" href="#signupTab"
                                data-target="#signupTab" role="tab" aria-controls="pop1"
                                aria-selected="true">Sign up</a>

                            <a class="nav-item nav-link" id="forgot" data-toggle="tab" href="#forgotTab"
                                data-target="#forgotTab" role="tab" aria-controls="pop1"
                                aria-selected="true">Forgot</a>
                        </div>
                    </nav>

                    <div class="tab-pane fade show active" id="loginTab" role="tabpanel">
                        <form action="{{ route('login') }}" method="POST" id="loginForm">
                            @csrf
                            <div class="form-group mb-2">
                                <label class="float-left">Email Address</label>
                                <input type="email" name="email" value="{{ old('email') }}" id="emailLo"
                                    class="form-control @error('email') invalid @enderror" placeholder="Email Address"
                                    aria-label="Email Address">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-2">
                                <label class="float-left" for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="passwordLo" class="form-control"
                                        autocomplete>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="show-password"><i
                                                class="fa fa-eye"></i></span>
                                    </div>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="feedback" id="feedback"></div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-md btn-warning" id="loginUser">Login</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="signupTab" role="tabpanel">
                        <form action="{{ route('register') }}" method="POST" id="registerForm">
                            @csrf
                            <div id="registerfeedback"></div>
                            <div class="col-md-12 mb-2">
                                <label class="float-left">Full Name</label>
                                <input type="text" name="name" id="nameRe" value="{{ old('name') }}"
                                    class="form-control @error('name') invalid @enderror">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="col-md-12 mb-2">
                                <label class="float-left">Phone</label>
                                <input type="text" name="phone" id="phoneRe" value="{{ old('phone') }}"
                                    class="form-control @error('phone') invalid @enderror">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            <div class="col-md-12 mb-2">
                                <label class="float-left">Email Address</label>
                                <input type="email" name="email" id="emailRe" value="{{ old('email') }}"
                                    class="form-control @error('email') invalid @enderror">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="col-md-12 mb-2">
                                <label class="float-left">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="passwordRe" class="form-control">
                                    <div class="input-group-append">
                                        <span class="input-group-text show-passwordRe"><i
                                                class="fa fa-eye"></i></span>
                                    </div>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <input type="hidden" name="role" id="roleRe" value="buyer">
                            <div class="col-md-12 text-left mb-2">
                                <label class="">
                                    <input type="checkbox" checked name="" id="termsOfService">I agree to
                                    the<a href="#" class="terms">terms of service</a></label>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-md btn-warning"
                                    id="registerSubmit">Register</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="forgotTab" role="tabpanel">
                        <form action="{{ route('password.email') }}" method="POST" id="passwordResetLinkForm">
                            <div class="feedback" id="feedback"></div>
                            @csrf
                            <div class="form-group">
                                <label class="float-left">Email Address</label>
                                <input type="email" name="email" value="{{ old('email') }}" id="emailForget"
                                    class="form-control @error('email') invalid @enderror" placeholder="Email Address"
                                    aria-label="Email Address">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-md btn-warning btn-round" id="submitEmail">Send
                                    Link</button>
                            </div>
                        </form>
                    </div>

                    <div class="login-social border-t mt-1 pt-2 mb-1 text-center">
                        <p class="mb-2">OR</p>
                        <br>

                        <a class="btn-google" id="buttonDiv"></a> <br>
                        <a href="{{ route('facebook.login') }}" class="btn-facebook mt-2 btn-block"><i
                                class="fa fa-facebook" aria-hidden="true"></i>
                            Facebook</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}



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
