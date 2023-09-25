<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script src="https://kit.fontawesome.com/4930f74824.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/components.css') }}" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/some.css') }}">
    <style>
        .btn-floated {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
        .lds-roller {
            display: none;
        }
    </style>
    <title>@yield('title') | AA Kenya Limited</title>
    @yield('header_styles')
</head>

<body>
    <input type="checkbox" name="nav-toggle" id="nav-toggle">
    <div class="sidebar">

        <div class="sidebar-brand">
            <a href="{{ url('/') }}"><i class="fa fa-home fa-2x text-white"></i><b><span class="text-white">Automart</span></b></a>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ url('/') }}">
                        <span><i class="fa fa-house"></i></span>
                        <span>Home</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin') ? 'active' : '' }}">
                    <a href="{{ route('admin.index') }}">
                        <span><i class="fa fa-tachometer"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/vehicles') ? 'active' : '' }}">
                    <a href="{{ route('admin.vehicles') }}" class='validation' id="membership">
                        <span><i class="fa-solid fa-car-side"></i></span>
                        <span>Vehicles</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/requests') ? 'active' : '' }}">
                    <a href="{{ route('admin.requests') }}" class='validation' data-id=2 id="membership">
                        <span><i class="fa fa-hand"></i></span>
                        <span>Requests</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/users') ? 'active' : '' }}">
                    <a href="{{ route('admin.users') }}" class='validation' data-id=49 id="loans">
                        <span><i class="fa fa-users"></i></span>
                        <span>Users</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/accounts') ? 'active' : '' }}">
                    <a href="{{ route('admin.accounts') }}" id="accounts" class='validation' data-id=14>
                        <span><i class="fa fa-usd"></i></span>
                        <span>Accounting</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings') }}" id="settings" class='validation' data-id=14>
                        <span><i class="fa fa-cog"></i></span>
                        <span>Settings</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/reports') ? 'active' : '' }}">
                    <a href="{{ route('admin.reports') }}" id="reports" class='validation' data-id=56>
                        <span><i class="fa fa-chart-line"></i></span>
                        <span>Reports</span>
                    </a>
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="validation text-warning" :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <span><i class="fa fa-sign-out-alt"></i></span>
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
                            class="profilephoto">
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

    </div>
</body>

<script src="{{ asset('js/components.js') }}"></script>
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{ asset('js/main/moment.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
@yield('footer_scrips')

</html>
