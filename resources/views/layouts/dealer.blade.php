<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/components.css') }}" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" id="master-css">
    <link href="{{ asset('css/master.css') }}" rel="stylesheet" id="master-css">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" id="master-css">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <title>Dealer | @yield('title')</title>
    @yield('header_styles')
</head>

<body>
    <input type="checkbox" name="nav-toggle" id="nav-toggle" checked>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>
                <a href="{{ url('/') }}"><i class="fas fa-home fa-2x text-white"></i><b><span class="text-white">AA
                            KENYA</span></b></a>
            </h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ url('/') }}">
                        <span><i class="fal fa-home"></i></span>
                        <span>Home</span>
                    </a>
                </li>

                <li class="{{ Request::is('dealer') ? 'active' : '' }}">
                    <a href="{{ route('dealer.index') }}">
                        <span><i class="fal fa-tachometer"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ Request::is('dealer/vehicles') ? 'active' : '' }}" class='validation'>
                    <a href="{{ route('dealer.vehicles') }}">
                        <span><i class="fad fa-cars"></i></span>
                        <span>Vehicles</span>
                    </a>
                </li>

                <li class="{{ Request::is('dealer/requests') ? 'active' : '' }}">
                    <a href="{{ route('dealer.requests') }}" class='validation'>
                        <span><i class="fal fa-hand-heart"></i></span>
                        <span>Requests</span>
                    </a>
                </li>

                <li class="{{ Request::is('profile') ? 'active' : '' }}">
                    <a href="{{ route('profile') }}" class='validation'>
                        <span><i class="fal fa-user"></i></span>
                        <span>My profile</span>
                    </a>
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="validation text-warning" :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <span><i class="fal fa-sign-out-alt"></i></span>
                            <span>{{ __('Log Out') }}</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>


    <div class="main-content">
        <div class="header">
            <h2 class="text text-white">
                <label for="nav-toggle">
                    <i class="fas fa-bars"></i>
                </label>
                @yield('page')
            </h2>

            <li class="nav-item" id="subscriptionCountdowntimer"></li>

            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink6" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('images/avatar.png') }}" height="30px" width="30px"alt=""
                            class="profilephoto">{{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">My Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                        {{-- <li><a class="dropdown-item" href="">Logout</a></li> --}}

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a></li>
                        </form>
                    </ul>
                </li>
            @endauth
        </div>

        @yield('main')
        <input type="hidden" name="subscription_expiry_date" id="subscriptionExpiryDate">
    </div>
</body>



<div class="modal fade" id="addBusinessModal" tabindex="-1" role="dialog" aria-labelledby="quoteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" id="vehiclePreviewSection">
            <div class="modal-header">
                <div class="modal-title" id="carOverviewModalLabel">
                    <h3>Business Information</h3>
                </div>
                <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div id="businessfeedback"></div>
                <form action="{{ route('dealer.store') }}" method="POST" enctype="multipart/form-data"
                    id="dealerForm">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="dealer_id" id="dealerID" value="{{ auth()->user()->dealer?->id }}">
                        <div class="col-md-6 form-group">
                            <label for="name">Business Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="dealerName"
                                    placeholder="Name" aria-label="Business Name">
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="email">Business Email</label>
                            <div class="form-group email">
                                <input type="email" class="form-control" name="email" id="dealerEmail"
                                    placeholder="Email" aria-label="Business Email">
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="phone">Business Phone</label>
                            <div class="form-group number">
                                <input type="text" class="form-control" name="phone" id="dealerPhone"
                                    placeholder="Phone" aria-label="Business Phone">
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="phone">Alternative Phone</label>
                            <div class="form-group number">
                                <input type="text" class="form-control" name="alt_phone" id="dealerAltPhone"
                                    placeholder="Phone" aria-label="Alt Phone">
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="phone">Zip/Postal Address</label>
                            <div class="form-group number">
                                <input type="text" class="form-control" name="postol" id="postolAddress"
                                    placeholder="Zip/Postal Address" aria-label="">
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="phone">Physical Address</label>
                            <div class="form-group number">
                                <input type="text" class="form-control" name="address" id="dealerAddress"
                                    placeholder="Physical Address" aria-label="">
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="phone">City</label>
                            <div class="form-group number">
                                <input type="text" class="form-control" name="city" id="dealerCity"
                                    placeholder="City" aria-label="">
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="phone">Logo</label>
                            <div class="form-group number">
                                <input type="file" name="logo" id="dealerLogo">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class='btn btn-success btn-md' type="submit" id='savedealer'><i
                                            class="fal fa-save fa-lg fa-fw"></i>
                                        Save
                                    </button>
                                    <button class='btn btn-outline-warning btn-md' id='cleardealer'><i
                                            class="fal fa-broom fa-lg fa-fw"></i>
                                        Clear Fields</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="subscriptionPlansModal" tabindex="-1" role="dialog" aria-labelledby="quoteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content" id="vehiclePreviewSection">

            <div class="modal-header bg-success">
                <div class="modal-title" id="carOverviewModalLabel">
                    <h4 class="text-white">Subscription Plans</h4>
                </div>
                <button type="button" class="close btn btn-warning text-danger" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row" id="planSubsSummary">
                    <div class="col-md-4">
                        <h4 class="text-success"><strong>Services</strong></h4>
                        <ol class="list-group" id="subscriptionprops">

                        </ol>
                    </div>

                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/components.js') }}"></script>
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{ asset('js/main/moment.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/main/dealer.js') }}"></script>
<script src="{{ asset('js/main/subscriptions.js') }}"></script>

@yield('footer_scrips')

</html>
