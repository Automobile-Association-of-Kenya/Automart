<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/components.css') }}" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset('css/master.css') }}" rel="stylesheet" id="master-css">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" />
    {{-- <link rel="icon" href="{{ asset('images/logo.png') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">

    <title>@yield('title') | AA Kenya Limited</title>
    <style>
        sup {
            font-size: 16px;
            color: #f00;
            font-weight: 600
        }
        .pagetitle {
            margin-bottom: 10px;
        }
        .pagetitle h1 {
            font-size: 24px;
            margin-bottom: 0;
            font-weight: 600;
            color: #006544;
        }
        .dashboard .info-card {
            padding-bottom: 10px;
        }
        .dashboard .info-card h6 {
            font-size: 28px;
            color: #006544;
            font-weight: 700;
            margin: 0;
            padding: 0;
        }
        .dashboard .sales-card .card-icon {
            color: #006544;
            background: #f6f6fe;
        }
        .dashboard .revenue-card .card-icon {
            color: #006544;
            background: #e0f8e9;
        }
        .dashboard .customers-card .card-icon {
            color: #fed945;
            background: #ffecdf;
        }
        .sidebar-menu li.active{
            border-bottom: 1px solid #fff;
            border-top: 1px solid #fff;
            background: #06ad75;
        }
    </style>
    @yield('header_styles')
</head>

<body>
    <input type="checkbox" name="nav-toggle" id="nav-toggle" checked>
    <div class="sidebar">

        <div class="sidebar-brand">
            <h2>
                <a href="{{ url('/') }}"><i class="fas fa-home text-white"></i><b><span class="text-white">AA
                            KENYA</span></b></a>
            </h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class='validation' data-id=48 id="dashboard">
                        <span><i class="fal fa-tachometer"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ Request::is('vehicles') ? 'active' : '' }}">
                    <a href="{{ route('vehicles.index') }}" class='validation' data-id=2 id="membership">
                        <span><i class="fal fa-cars"></i></span>
                        <span>Vehicles</span>
                    </a>
                </li>

                <li class="{{ Request::is('requests') ? 'active' : '' }}">
                    <a href="{{ route('requests.index') }}" class='validation' data-id=2 id="membership">
                        <span><i class="fal fa-hand-heart"></i></span>
                        <span>Requests</span>
                    </a>
                </li>

                <li class="{{ Request::is('users') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class='validation' data-id=49 id="loans">
                        <span><i class="fal fa-users-crown"></i></span>
                        <span>Users</span>
                    </a>
                </li>

                <li class="{{ Request::is('accounts') ? 'active' : '' }}">
                    <a href="{{ route('accounts.index') }}" id="accounts" class='validation' data-id=14>
                        <span><i class="fal fa-cog"></i></span>
                        <span>Accounting</span>
                    </a>
                </li>

                <li class="{{ Request::is('settings') ? 'active' : '' }}">
                    <a href="{{ route('settings.index') }}" id="settings" class='validation' data-id=14>
                        <span><i class="fal fa-cog"></i></span>
                        <span>Settings</span>
                    </a>
                </li>

                <li class="{{ Request::is('reports') ? 'active' : '' }}">
                    <a href="reports.php" id="reports" class='validation' data-id=56>
                        <span><i class="fal fa-chart-line"></i></span>
                        <span>Reports</span>
                    </a>
                </li>

                <li>
                    <a href="../controllers/useroperations.php?logoutuser" id="logoutuser">
                        <span><i class="fal fa-sign-out-alt"></i></span>
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
                    <i class="fas fa-bars"></i>
                </label>
                @yield('page')
            </h2>

            {{-- <div class="search-wrapper">
                <i class="fas fa-search text-white"></i>
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
</body>

<script src="js/components.js"></script>
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{ asset('js/main/moment.js') }}"></script>
@yield('footer_scrips')

</html>
