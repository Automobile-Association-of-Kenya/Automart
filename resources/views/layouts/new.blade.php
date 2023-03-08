<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/autocar-2-html/HTML/main/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Oct 2022 06:54:07 GMT -->

<head>
    <title>Automart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap-submenu.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap-select.min.css') }}">
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
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/ie10-viewport-bug-workaround.css') }}">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="{{ url('assets/js/ie8-responsive-file-warning.js') }}"></script><![endif]-->
    <script src="{{ url('assets/js/ie-emulation-modes-warning.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ url('assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ url('assets/js/respond.min.js') }}"></script>
    <![endif]-->
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
                                <a href="{{ route('dealerreg') }}" class="sign-in"><i class="fa fa-user"></i> Register</a>
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
        <div class="container" >
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
                                style="background: #00472F;color:white;font-size:120%;text-align:left; padding-top:40px"> <i
                                    ></i> Search</button></a>
                    </li>
                    <li>
                    <a href="{{ route('all_cars') }}"> <button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left; padding-top:40px"> <i
                                    ></i>All Cars</button></a>
                    </li>
                    <li>
                    <a class="nav-link" href="/terms" button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left; padding-top:45px"> <i
                                    ></i>Terms</button></a>
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
                            <a class="nav-link" href="{{ route('login') }}" style="color: #fed925;">{{Auth::user()->name}}</a>
                        </li> -->

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('login') }}" button type="submit" class="btn  btn-block"
                            style="background: #00472F;color:white;font-size:120%;text-align:left; padding-top:45px"> <i
                                    >{{Auth::user()->name}}</a>
                        </li>

                        <li>
                    <a  class="nav-link" href="{{ route('logout') }}" button type="submit" class="btn  btn-block"
                                style="background: #00472F;color:white;font-size:120%;text-align:left; padding-top:45px"> <i
                                ></i>Logout</button></a>
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
        <!-- Close btn-->
        <div id="dismiss">
            <i class="fa fa-close"></i>
        </div>
<!-- 
        <ul class="navbar-na" style="width: 100%;margin-top:40px;">

            <li class="nav-item" style="padding:5px; width:90%; margin:auto; background:#013f2a;margin-bottom:3px">
                    <a class="nav-link" href="{{ route('home') }}" style="color: #fff;">Search</a>
                </li>

                <li class="nav-item" style="padding:5px; width:90%; margin:auto; background:#013f2a;margin-bottom:3px">
                    <a class="nav-link" href="{{ route('all_cars') }}" style="color: #fff;">All Cars</a>
                </li>
                <li class="nav-item" style="padding:5px; width:90%; margin:auto; background:#013f2a;margin-bottom:3px">
                    <a class="nav-link" href="{{ route('dealerHome') }}" style="color: #fff;">Sell
                        Car</a>
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
                    <a class="nav-link" href="{{ route('login') }}" style="color: #fff;">{{Auth::user()->name}}</a>
                </li>
                <li class="nav-item" style="padding:5px; width:90%; margin:auto; background:#013f2a;margin-bottom:3px">
                    <a class="nav-link" href="{{ route('logout') }}" style="color: #fff;">Logout</a>
                </li>
                @endauth -->
        <!-- <div class="sidebar-inner">
            <div class="sidebar-logo">
                <a href="index.html">
                    <img src="img/logos/black-logo.png" alt="sidebarlogo">
                </a>
            </div>
            <div class="sidebar-navigation">
                <h3 class="heading">Pages</h3>
                <ul class="menu-list">
                    <li><a href="#" class="pt0">Index <em class="fa fa-chevron-down"></em></a>
                        <ul>
                            <li><a href="index.html">Index 01</a></li>
                            <li><a href="index-2.html">Index 02</a></li>
                            <li><a href="index-3.html">Index 03</a></li>
                            <li><a href="index-4.html">Index 04</a></li>
                            <li><a href="index-5.html">Index 05</a></li>
                            <li><a href="index-6.html">Index 06</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Car Listing <em class="fa fa-chevron-down"></em></a>
                        <ul>
                            <li>
                                <a href="#">List Layout <em class="fa fa-chevron-down"></em></a>
                                <ul>
                                    <li><a href="car-list-rightside.html">List Right Sidebar</a></li>
                                    <li><a href="car-list-leftsidebar.html">List Left Sidebar</a></li>
                                    <li><a href="car-list-fullWidth.html">List FullWidth</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Grid Layout <em class="fa fa-chevron-down"></em></a>
                                <ul>
                                    <li><a href="car-grid-rightside.html">Grid Right Sidebar</a></li>
                                    <li><a href="car-grid-leftside.html">Grid Left Sidebar</a></li>
                                    <li><a href="car-grid-fullWidth.html">Grid FullWidth</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Car Details <em class="fa fa-chevron-down"></em></a>
                                <ul>
                                    <li><a href="car-details.html">Car Details 1</a></li>
                                    <li><a href="car-details-2.html">Car Details 2</a></li>
                                    <li><a href="car-details-3.html">Car Details 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Pages <em class="fa fa-chevron-down"></em></a>
                        <ul>
                            <li><a href="about.html">About Us</a></li>
                            <li>
                                <a href="#">Agent <em class="fa fa-chevron-down"></em></a>
                                <ul>
                                    <li><a href="agent.html">Agent</a></li>
                                    <li><a href="agent-detail.html">Agent Details</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Services <em class="fa fa-chevron-down"></em></a>
                                <ul>
                                    <li><a href="services.html">Services 1</a></li>
                                    <li><a href="services-2.html">Services 2</a></li>
                                </ul>
                            </li>
                            <li><a href="car-comparison.html">Car Compare</a></li>
                            <li><a href="pricing-tables.html">Pricing Tables</a></li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="elements.html">Elements</a></li>
                            <li><a href="faq.html">Faq</a></li>
                            <li><a href="search-brand.html">Car Brands</a></li>
                            <li><a href="icon.html">Icons</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                            <li><a href="404.html">Error Page</a></li>
                            <li><a href="login.html">login</a></li>
                            <li><a href="signup.html">Register</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Blog <em class="fa fa-chevron-down"></em></a>
                        <ul>
                            <li><a href="blog-post.html">Blog Post</a></li>
                            <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Shop <em class="fa fa-chevron-down"></em></a>
                        <ul>
                            <li><a href="shop-list.html">Shop List</a></li>
                            <li><a href="shop-cart.html">Shop Cart</a></li>
                            <li><a href="shop-checkout.html">Shop Checkout</a></li>
                            <li><a href="shop-details.html">Shop Details</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact.html" class="active">Contact</a>
                    </li>
                    <li>
                        <a href="#full-page-search" class="nav-link h-icon">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="get-in-touch">
                <h3 class="heading">Get in Touch</h3>
                <div class="get-in-touch-box d-flex mb-2">
                    <i class="flaticon-phone"></i>
                    <a href="tel:0477-0477-8556-552">0288 2547 874</a>
                </div>
                <div class="get-in-touch-box d-flex mb-2">
                    <i class="flaticon-mail"></i>
                    <div class="media-body">
                        <a href="#">info@themevessel.com</a>
                    </div>
                </div>
                <div class="get-in-touch-box d-flex">
                    <i class="flaticon-earth"></i>
                    <div class="media-body">
                        <a href="#">info@themevessel.com</a>
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
            </div>
        </div> -->
    </nav>
    <!-- Sidenav end -->
    @yield('content')
    <!-- Footer start -->
    <footer class="footer" style="background-color:#00472F">

        <div class="sub-footer" style="background-color:#00472F">
            <div class="container" >
                <div class="row">
                    <div class="col-lg-6 col-md-6" style="background-color:#00472F;text-align:center;width:100%">
                        <p class="copy" style="text-align: center;width:100%">© {{ now()->year }} <a href="#">AAK Kenya.</a> All Rights Reserved.
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
        <form action="#" class="full-page-search-inner">
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-sm button-theme">Search</button>
        </form>
    </div>

    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
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

<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/autocar-2-html/HTML/main/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Oct 2022 06:54:07 GMT -->

</html>
