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

    <title>Partner | @yield('title')</title>
</head>

<body>
    <input type="checkbox" name="nav-toggle" id="nav-toggle" checked>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>
                <a href="{{ url('/') }}"><i class="fa fa-home text-white"></i><b><span class="text-white">AA
                            KENYA</span></b></a>
            </h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li class="{{ Request::is('partner') ? 'active' : '' }}">
                    <a href="{{ route('partner.index') }}">
                        <span><i class="fa fa-tachometer"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ Request::is('partner/loans') ? 'active' : '' }}">
                    <a href="{{ route('partner.loans') }}">
                        <span><i class="fa fa-usd-circle"></i></span>
                        <span>Loans</span>
                    </a>
                </li>

                <li class="">
                    <a href="#">
                        {{-- {{ route('partner.vehicles') }} --}}
                        <span><i class="fad fa-cars"></i></span>
                        <span>Vehicles</span>
                    </a>
                </li>

                <li class="#">
                    <a href="#">
                        {{-- {{ route('partner.customers') }} --}}
                        <span><i class="fa fa-users-crown"></i></span>
                        <span>Customers</span>
                    </a>
                </li>

                <li>
                    <a href="#" id="logoutuser">
                        <span><i class="fa fa-sign-out-alt"></i></span>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <div class="main-content">
        <div class="header">
            <h2 class="text text-white">
                <label for="nav-toggle">
                    <i class="fa fa-bars"></i>
                </label>
                @yield('page')
            </h2>

            {{-- <div class="search-wrapper">
                <i class="fa fa-search text-white"></i>
                <input type="text" name="search" id="search" placeholder="Search here ...">
            </div> --}}

            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink6" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
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
        </div>

        @yield('main')

    </div>
    <!-- End of Template -->
</body>

<script src="{{ asset('js/components.js') }}"></script>
<script src="{{ asset('js/iziToast.min.js') }}"></script>
@yield('footer_scripts')

</html>
