<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand company-logo-2" href="{{ url('/') }}">
            {{-- <img src="img/logos/black-logo.png" alt="logo"> --}}
            <h1>AutoMart</h1>
        </a>
        <button class="navbar-toggler" type="button" id="drawer">
            <span class="fa fa-bars"></span>
        </button>
        <div class="navbar-collapse collapse w-100 justify-content-end" id="navbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}" aria-expanded="false">
                        Home
                    </a>
                </li>

                {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        </a>
                        <ul class="dropdown-menu megamenu" aria-labelledby="navbarDropdownMenuLink">
                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">List Layout</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="car-list-rightside.html">List Right Sidebar</a></li>
                                    <li><a class="dropdown-item" href="car-list-leftsidebar.html">List Left Sidebar</a></li>
                                    <li><a class="dropdown-item" href="car-list-fullWidth.html">List FullWidth</a></li>
                                </ul>
                            </li>

                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Grid Layout</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="car-grid-rightside.html">Grid Right Sidebar</a></li>
                                    <li><a class="dropdown-item" href="car-grid-leftside.html">Grid Left Sidebar</a></li>
                                    <li><a class="dropdown-item" href="car-grid-fullWidth.html">Grid FullWidth</a></li>
                                </ul>
                            </li>

                            <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Car Details</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="car-details.html">Car Details 1</a></li>
                                    <li><a class="dropdown-item" href="car-details-2.html">Car Details 2</a></li>
                                    <li><a class="dropdown-item" href="car-details-3.html">Car Details 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}

                <li class="nav-item dropdown megamenu-li">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Buying a car?</a>
                    <div class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                        <div class="megamenu-area">

                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="megamenu-section" id="vehicleGroupTypes">
                                        <h6 class="megamenu-title">Vehicle Types</h6>

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="megamenu-section" id="vehicleGroupandMakes">
                                        <h6 class="megamenu-title">Vehicle Makes</h6>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="megamenu-section">
                                        <h6 class="megamenu-title">Others</h6>
                                        <a class="dropdown-item" href="{{ route('new') }}">New Arrivals</a>
                                        <a class="dropdown-item" href="{{ url('discounted-vehicles') }}">Discounted</a>
                                        <a class="dropdown-item" href="{{ url('vehicles-list') }}">High end</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </li>


                {{-- <li class="nav-item dropdown megamenu-li">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Selling A car</a>
                        <div class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                            <div class="megamenu-area">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                        <div class="megamenu-section">
                                            <h6 class="megamenu-title">Vehicle Categories</h6>
                                            <a class="dropdown-item" href="{{ url('new-arrivals') }}">New Arrivals</a>
                                            <a class="dropdown-item" href="{{ url('vehicles-discounted') }}">Discounted</a>
                                            <a class="dropdown-item" href="#">Premium</a>
                                            <a class="dropdown-item" href="#">Vehicle Types</a>
                                            <a class="dropdown-item" href="services-2.html">Services 2</a>
                                            <a class="dropdown-item" href="car-comparison.html">Car Compare</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                        <div class="megamenu-section">
                                            <h6 class="megamenu-title">Pages</h6>
                                            <a class="dropdown-item" href="pricing-tables.html">Pricing Tables</a>
                                            <a class="dropdown-item" href="gallery.html">Gallery</a>
                                            <a class="dropdown-item" href="typography.html">Typography</a>
                                            <a class="dropdown-item" href="elements.html">Elements</a>
                                            <a class="dropdown-item" href="faq.html">Faq</a>
                                            <a class="dropdown-item" href="search-brand.html">Car Brands</a>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-4 col-lg-4">
                                        <div class="megamenu-section">
                                            <h6 class="megamenu-title">Pages</h6>
                                            <a class="dropdown-item" href="icon.html">Icons</a>
                                            <a class="dropdown-item" href="coming-soon.html">Coming Soon</a>
                                            <a class="dropdown-item" href="404.html">Error Page</a>
                                            <a class="dropdown-item" href="login.html">login</a>
                                            <a class="dropdown-item" href="signup.html">Register</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </li> --}}

                @if (auth()->user() && auth()->user()->role === 'dealer')
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('dealers.index') }}">Selling Vehicles?</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('dealers.create') }}">Selling Vehicles?</a>
                    </li>
                @endif

                {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Blog
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="blog-post.html">Blog Post</a></li>
                            <li><a class="dropdown-item" href="blog-sidebar.html">Blog Sidebar</a></li>
                            <li><a class="dropdown-item" href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li> --}}

                <li class="nav-item dropdown">
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
                </li>

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
                            @if (auth()->user()->role === 'admin' && auth()->user()->role === 'dealer')
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            @endif
                            {{-- <li><a class="dropdown-item" href="">Logout</a></li> --}}

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <li><a class="dropdown-item" :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a></li>
                            </form>
                        </ul>
                    </li>
                @endauth

            </ul>
        </div>
    </nav>
</div>
