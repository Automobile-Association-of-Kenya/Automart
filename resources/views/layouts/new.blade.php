<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/autocar-2-html/HTML/main/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Oct 2022 06:54:07 GMT -->

<head>
    <title>

        @section('title')
            | Automart
        @show

    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap-submenu.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/fonts/flaticon/font/flaticon.css') }}">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ url('assets/css/skins/yellow.css') }}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

</head>

<body>

    <!-- Top header start -->
    <header class="top-header bg-active" id="top-header-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-7">
                    <div class="list-inline">
                        <a href="tel:1-8X0-666-8X88"><i class="fa fa-phone"></i>Need Support? 0709933999</a>
                        <a href="tel:customercare@aakenya.co.ke"><i
                                class="fa fa-envelope"></i>customercare@aakenya.co.ke</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-5">

                    <ul class="top-social-media pull-right">
                        @guest
                            <li>
                                <a href="{{ route('login') }}" class="sign-in"><i class="fa fa-sign-in"></i> Login</a>
                            </li>
                            <li>
                                <a href="{{ route('register') }}" class="sign-in"><i class="fa fa-user"></i> Register</a>
                            </li>
                        @endguest
                        @auth
                            <li>
                                <a href="{{ route('login') }}" class="sign-in"><i class="fa fa-user"></i>
                                    {{ Auth::user()->name }}</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" class="sign-in"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- Top header end -->

    <!-- Main header start -->
    <header class="main-header sticky-header sh-2" style="background:#00472f6b; backdrop-filter: blur(5px)">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand company-logo-2" href="{{ route('home') }}">
                    <h1 class="text-white"> Automart | Home</h1>
                </a>
                <button class="navbar-toggler" type="button" id="drawer">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="navbar-collapse collapse w-100 justify-content-end" id="navbar">
                    <ul class="navbar-nav ml-auto">

                        <li>
                            <a href="{{ route('home') }}"> <button type="submit" class="btn  btn-block"
                                    style="background: #00472F;color:white;font-size:120%;text-align:left; padding-top:40px">
                                    <i></i> Search</button></a>
                        </li>
                        <li>
                            <a href="{{ route('all_cars') }}"> <button type="submit" class="btn  btn-block"
                                    style="background: #00472F;color:white;font-size:120%;text-align:left; padding-top:40px">
                                    <i></i>All Cars</button></a>
                        </li>
                        <li>
                            <a class="nav-link" href="/terms" button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left; padding-top:45px">
                                <i></i>Terms</button></a>
                        </li>

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('all_cars') }}" style="color: #fed925;">All Cars</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('dealerHome') }}" style="color: #fed925;">Sell
                                Car</a>
                        </li> -->

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link" href="/terms" style="color: #fed925;">Terms</a>
                        </li> -->
                        @guest
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link" href="{{ route('login') }}" button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left; padding-top:45px"> <i
                                        class="fa fa-home"></i>Login</button></a>
                            </li> -->
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link" href="{{ route('contact') }}" style="color: #fed925;">Contact</a>
                            </li> -->

                        @endguest
                        @auth
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link" href="{{ route('login') }}" style="color: #fed925;">{{ Auth::user()->name }}</a>
                            </li> -->

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{ route('dealer.home') }}" button type="submit"
                                    class="btn  btn-block"
                                    style="background: #00472F;color:white;font-size:120%;text-align:left; padding-top:45px">
                                    <i>{{ Auth::user()->name }}</a>
                            </li>

                            <li>
                                <a class="nav-link" href="{{ route('logout') }}" button type="submit"
                                    class="btn  btn-block"
                                    style="background: #00472F;color:white;font-size:120%;text-align:left; padding-top:45px">
                                    <i></i>Logout</button></a>
                            </li>

                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link" href="{{ route('logout') }}" style="color: #fed925;">Logout</a>
                            </li> -->
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- Main header end -->

    <!-- Sidenav start -->
    <nav id="sidebar" class="nav-sidebar" style="background: #00472F">
        <div id="dismiss">
            <i class="fa fa-close"></i>
        </div>

        <ul class="navbar-na" style="width: 100%;margin-top:40px;">

            <li class="nav-item" style="padding:5px; width:90%; margin:auto; background:#013f2a;margin-bottom:3px">
                <a class="nav-link" href="{{ route('home') }}" style="color: #fff;">Search</a>
            </li>

            <li class="nav-item" style="padding:5px; width:90%; margin:auto; background:#013f2a;margin-bottom:3px">
                <a class="nav-link" href="{{ route('all_cars') }}" style="color: #fff;">All Cars</a>
            </li>

            <li class="nav-item" style="padding:5px; width:90%; margin:auto; background:#013f2a;margin-bottom:3px">
                <a class="nav-link" href="/terms" style="color: #fff;">Terms</a>
            </li>
            @guest
                <li class="nav-item" style="padding:5px; width:90%; margin:auto; background:#013f2a;margin-bottom:3px">
                    <a class="nav-link" href="{{ route('login') }}" style="color: #fff;">Login</a>
                </li>
                <li class="nav-item" style="padding:5px; width:90%; margin:auto; background:#013f2a;margin-bottom:3px">
                    <a class="nav-link" href="{{ route('contact') }}" style="color: #fff;">Contact</a>
                </li>
            @endguest
            @auth
                <li class="nav-item" style="padding:5px; width:90%; margin:auto; background:#013f2a;margin-bottom:3px">
                    <a class="nav-link" href="{{ route('login') }}" style="color: #fff;">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item" style="padding:5px; width:90%; margin:auto; background:#013f2a;margin-bottom:3px">
                    <a class="nav-link" href="{{ route('logout') }}" style="color: #fff;">Logout</a>
                </li>
            @endauth
        </ul>
    </nav>

    <!-- Sidenav end -->
    @yield('content')
    <!-- Footer start -->
    <footer class="footer" style="background-color:#00472F; margin-top: 15em;">

        <div class="sub-footer" style="background-color:#00472F">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6" style="background-color:#00472F;text-align:center;width:100%">
                        <p class="copy" style="text-align: center;width:100%">© {{ now()->year }} <a
                                href="#">AAK Kenya.</a> All Rights Reserved.
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

    <script src="{{ url('js/components.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap-submenu.js') }}"></script>
    <script src="{{ url('assets/js/rangeslider.js') }}"></script>
    <script src="{{ url('assets/js/jquery.mb.YTPlayer.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap-select.min.js') }}"></script>
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

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ url('assets/js/ie10-viewport-bug-workaround.js') }}"></script>
    <!-- Custom javascript -->
    <script src="{{ url('assets/js/ie10-viewport-bug-workaround.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4omYJlOaP814WDcCG8eubXcbhB-44Uac"></script>

    <script>
        function LoadMap(propertes) {
            var defaultLat = 40.7110411;
            var defaultLng = -74.0110326;
            var mapOptions = {
                center: new google.maps.LatLng(defaultLat, defaultLng),
                zoom: 15,
                scrollwheel: false,
                styles: [{
                        featureType: "administrative",
                        elementType: "labels",
                        stylers: [{
                            visibility: "off"
                        }]
                    },
                    {
                        featureType: "water",
                        elementType: "labels",
                        stylers: [{
                            visibility: "off"
                        }]
                    },
                    {
                        featureType: 'poi.business',
                        stylers: [{
                            visibility: 'off'
                        }]
                    },
                    {
                        featureType: 'transit',
                        elementType: 'labels.icon',
                        stylers: [{
                            visibility: 'off'
                        }]
                    },
                ]
            };
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            var infoWindow = new google.maps.InfoWindow();
            var myLatlng = new google.maps.LatLng(40.7110411, -74.0110326);

            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map
            });
            (function(marker) {
                google.maps.event.addListener(marker, "click", function(e) {
                    infoWindow.setContent("" +
                        "<div class='map-properties contact-map-content'>" +
                        "<div class='map-content'>" +
                        "<p class='address'>20-21 Kathal St. Tampa City, FL</p>" +
                        "<ul class='map-properties-list'> " +
                        "<li><i class='flaticon-phone'></i>  +0477 8556 552</li> " +
                        "<li><i class='flaticon-phone'></i>  info@themevessel.com</li> " +
                        "<li><a href='index.html'><i class='fa fa-globe'></i>  http://www.example.com</li></a> " +
                        "</ul>" +
                        "</div>" +
                        "</div>");
                    infoWindow.open(map, marker);
                });
            })(marker);
        }
        LoadMap();
    </script>

</body>

</html>
