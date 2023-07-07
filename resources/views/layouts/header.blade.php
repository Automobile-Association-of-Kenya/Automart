<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand company-logo-2" href="{{ url('/') }}">
            {{-- <img src="img/logos/black-logo.png" alt="logo"> --}}
            <h1>AA AutoMart</h1>
        </a>
        <button class="navbar-toggler" type="button" id="drawer">
            <span class="fa fa-bars"></span>
        </button>
        <div class="navbar-collapse collapse w-100 justify-content-end" id="navbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}" aria-expanded="false">
                        Home
                    </a>
                </li>

                <li class="nav-item dropdown megamenu-li">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Buying a car?</a>
                    <div class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                        <div class="megamenu-area">

                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="megamenu-section" id="vehicleGroupTypes">
                                        <h6 class="megamenu-title text-success">Vehicle Types</h6>

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="megamenu-section" id="vehicleGroupandMakes">
                                        <h6 class="megamenu-title text-success">Top Brands</h6>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="megamenu-section" id="otherModels">
                                        <h6 class="megamenu-title  text-success">Others</h6>
                                        <a class="dropdown-item" href="{{ route('new') }}">New Arrivals</a>
                                        <a class="dropdown-item" href="{{ route('vehicles.discounts') }}">Discounted</a>
                                        <a class="dropdown-item" href="{{ route('vehicles.list') }}">All Vehicles</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dealer.vehicles') }}">Selling Vehicles?</a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Partner</a>
                </li> --}}

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink7"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Shop
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="shop-list.html">Shop List</a></li>
                        <li><a class="dropdown-item" href="shop-cart.html">Shop Cart</a></li>
                        <li><a class="dropdown-item" href="shop-checkout.html">Shop Checkout</a></li>
                        <li><a class="dropdown-item" href="shop-details.html">Shop Details</a></li>
                    </ul>
                </li> --}}

                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ url('about') }}">About Us</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{ url('contact') }}">Contact Us</a>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink6"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('images/avatar.png') }}" height="30px" width="30px"alt=""
                                class="profilephoto">{{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">My Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a class="dropdown-item" :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-md btn-outline-success btn-round" href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login / Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</div>

<!-- Sidenav start -->
<nav id="sidebar" class="nav-sidebar">
    <!-- Close btn-->
    <div id="dismiss">
        <i class="fa fa-close"></i>
    </div>
    <div class="sidebar-inner">
        <div class="sidebar-logo">
            <a href="index.html">
                {{-- <img src="img/logos/black-logo.png" alt="sidebarlogo"> --}}
                <h1>AutoMart</h1>
            </a>
        </div>
        <div class="sidebar-navigation">
            <h3 class="heading">Buying a Vehicle</h3>
            <ul class="menu-list">
                <li><a href="{{ url('/') }}" class="active pt0">Home</a></li>
                <li>
                    <a href="">Buying a Vehicle?<em class="fa fa-chevron-down"></em></a>
                    <ul>
                        <li>
                            <a href="#">Vehicle Types<em class="fa fa-chevron-down"></em></a>
                            <ul id="vehicleGroupType">
                            </ul>
                        </li>
                        <li>
                            <a href="#">Vehicle Makes <em class="fa fa-chevron-down"></em></a>
                            <ul id="vehicleGroupMakes">
                            </ul>
                        </li>
                        <li>
                            <a href="#">Others <em class="fa fa-chevron-down"></em></a>
                            <ul>
                                <a href="{{ route('new') }}">New Arrivals</a>
                                <a href="{{ url('discounted-vehicles') }}">Discounted</a>
                                <a href="{{ route('vehicles.list') }}">All Vehicles</a>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="nav-link" href="{{ route('dashboard') }}">Selling Vehicles?</a>
                </li>

                <li>
                    <a class="nav-link" href="{{ route('dashboard') }}">Partner</a>
                </li>

                <li>
                    <a href="{{ route('contact') }}">Contact</a>
                </li>

                @auth
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink6"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('images/avatar.png') }}" height="30px" width="30px"alt=""
                                class="profilephoto">{{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">My Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            {{-- <li><a class="dropdown-item" href="">Logout</a></li> --}}

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a class="dropdown-item" :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" data-toggle="modal" data-target="accountModal"> <i
                                class="fa fa-sign-in"></i>Login / Register</a>
                    </li>
                @endauth

                {{-- <li>
                    <a href="#full-page-search" class="nav-link h-icon">
                        <i class="fa fa-search"></i>
                    </a>
                </li> --}}
            </ul>
        </div>
        {{-- <div class="get-in-touch">
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
        </div> --}}
        {{-- <div class="get-social">
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
        </div> --}}
    </div>
</nav>
