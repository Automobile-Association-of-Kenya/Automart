<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AAutomart | AAKenya</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ url('favicon/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ url('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ url('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ url('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ url('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ url('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#fed925">
    <meta name="msapplication-TileImage" content="{{ url('favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#fed925">

    <!-- jquery -->
    <script type="text/javascript" src="{{ url('resources/jquery/jquery_003.js') }}" id="jquery-iframe-transport-js">
    </script>
    <script type="text/javascript" src="{{ url('resources/jquery/jquery_007.js') }}" id="jquery-fileupload-js"></script>
    <script type="text/javascript" src="{{ url('resources/jquery/jquery_006.js') }}" id="jquery-fileupload-process-js">
    </script>
    <script type="text/javascript" src="{{ url('resources/jquery/jquery_002.js') }}" id="jquery-fileupload-validate-js">
    </script>
    <script type="text/javascript" src="{{ url('resources/jquery/media-upload.js') }}" id="media-upload-js"></script>
    <link src="{{ url('resources/jquery/jquery_002.css') }}" rel="stylesheet" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet" />
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%;
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fed925;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

    <style>
        body {
            background-color: #FFFFFF;
            font-family: 'Nunito', sans-serif;
            color: #fff;
            padding-top: 10px;
        }
    </style>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
    <script src="https://code.iconify.design/2/2.1.2/iconify.min.js"></script>
</head>

<body class="antialiased">

    <div class="container-xxl2"
        style="background-color : rgba(0,0,0, 0.3) !Important; width: 98% !Important;  padding-bottom : 10px !Important;">

        {{-- <div class="row" style="color: #fff; padding-bottom: 15px;">
            <div class="col-md-8">
                <h1>AAutomart | AAKENYA</h1>
                <h6>A PRODUCT OF AUTOMOBILE ASSOCIATION OF KENYA</h6>
            </div>
            <div class="col-md-4" style="padding-top: 25px; padding-left: 20px; ">
                <h2 style="font-family:Garamond;"><b>0709 933 000 | 0709 933 999</b>&nbsp;<button
                        style="font-size:24px"><i class="fa fa-phone"></i></button></h2>
            </div>
        </div> --}}


        <nav id="sidebar" class="nav-sidebar" style="background: #FFFFFF">
             <!-- Close btn-->
             <div id="dismiss">
              <i class="fa fa-close"></i>
              </div>
              <div class="sidebar-inner">
              <!-- <div class="sidebar-logo">
                <a href="/" style="color:#fff">
                    {{-- <img src="{{url('assets/img/logos/black-logo.png')}}" alt="sidebarlogo"> --}}
                    AAutomart | AAKENYA
                </a>
            </div> -->

             <!-- <div >
                <h3 style="color: #fff;margin-top:5px;text-align:center; margin-bottom: 0">I want to..</h3>
                <ul class="navbar-nav " style="width:100%; margin:3px; margin-top:0 !important">
                    <li class="nav-item dropdown active" style="width:100%;">
                        <a class="nav-link font-weight-bold" style="width:100%;text-align:center" href="{{ route('all_cars') }}"> 
                            <button class="btn btn-warning" style="width:95%;"> <span style="color: #00472F">Buy a car</span></button>
                        </a>
                    </li>
                    <li class="nav-item dropdown active" style="width:100%;">
                        <a class="nav-link font-weight-bold" style="width:100%;text-align:center" href="{{ route('dealerHome') }}"> 
                            <button class="btn btn-warning" style="width:95%;"> <span style="color: #00472F"> Sell a Car</span></button>
                        </a>
                    </li>

                 </ul>

                 <a href="{{ route('login') }}" style="margin: 10px;text-align:left;" >
                    <button class="btn btn-outline-warning"> Sign in</button>
                 </a>
               </div>
             </nav>  -->


        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #00472F;">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse m-5" id="navbarSupportedContent">
                    <!-- Navbar brand -->
                    <a class="navbar-brand mt-2 mt-lg-0" href="{{ route('home') }}">
                        <h1 style="font-family:Garamond;color:white;margin-left:5%!important">AAutomart | AA Kenya</h1>
                    </a>
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 30% !important">
                        <li class="nav-item">
                            <a class="nav-link" style="font-size: 25px;color:#FFFFFF" href="{{ route('all_cars') }}">All Cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-size: 25px;color:#FFFFFF" href="{{ route('dealerHome') }}">Sell Your Car</a>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--<a class="nav-link" style="font-size: 25px;color:#CBBC27" href="{{ route('dealerHome') }}">Register as Seller</a>-->
                        <!--</li>-->
                        <!--<li class="nav-item">-->
                        <!--<a class="nav-link" style="font-size: 25px;color:#CBBC27" href="{{ route('userreg') }}">Register as Buyer</a>-->
                        <!--</li>-->
                        <li class="nav-item">
                            <a class="nav-link" style="font-size: 25px;color:#FFFFFF" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-size: 25px;color:#FFFFFF" href="{{ route('contact') }}">Contact Us</a>
                        </li>
                    </ul>
                    <!-- <div class="float-end"><a class="nav-link" href="#"><button type="button"
                                class="btn btn-info">Most Liked!</button></a></div> -->
                    <!-- Left links -->
                <!-- </div> -->
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
          </nav>
        <!-- Navbar -->
        <div class="row"
            style="padding-left: 20px;padding-right: 20px; padding-top: 10px; padding-bottom: 10px; color: #fff; ">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="text-center text-lg-start text-muted"
            style="background-color : #FFFFFF !Important; padding-top: 1px;">
            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5" style="color: #fff">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h4 class="text-uppercase fw-bold mb-4" style=" color: #00472F;">
                                <i class="fas fa-gem me-3"></i>AAutomart | AAkenya
                            </h4>
                            <p>
                                Thinking about selling your current vehicle?

                                Bring your car for an appraisal, and get a free written offer good for 7 days.

                                Submit your vehicle information now.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4" style=" color: #00472F;">
                                Products
                            </h6>
                            <p>
                                <a href="https://www.aakenya.co.ke/driving-school.html" class="text-reset">Driving
                                    School</a>
                            </p>
                            <p>
                                <a href="https://www.aakenya.co.ke/fleet.html" class="text-reset">Fleet Management</a>
                            </p>
                            <p>
                                <a href="https://www.aakenya.co.ke/driver-recruitment.html" class="text-reset">Driver
                                    Recruitment</a>
                            </p>
                            <p>
                                <a href="https://www.aakenya.co.ke/vehicle-valuation.html" class="text-reset">Vehicle
                                    Valuation</a>
                            </p>
                            <p>
                                <a href="https://www.aakenya.co.ke/touring-licensing.html" class="text-reset">Touring
                                    and Licensing</a>
                            </p>

                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4" style=" color: #00472F;">
                                Useful links
                            </h6>
                            <p>
                                <a href="https://www.aakenya.co.ke/vision.html" class="text-reset">Our
                                    Vision|Mission|Values</a>
                            </p>
                            <p>
                                <a href="https://www.aakenya.co.ke/jobs.html" class="text-reset">Careers</a>
                            </p>
                            <p>
                                <a href="https://www.aakenya.co.ke/contact.html" class="text-reset">Help</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4" style=" color: #00472F;">
                                Contact
                            </h6>
                            <p><i class="fas fa-home me-3"></i> Renaissance Corporate Park, 8th Floor, Upper Hill,
                                Nairobi</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                customercare@aakenya.co.ke
                            </p>
                            <p><i class="fas fa-phone me-3"></i> +254 709 933 000</p>
                            <p><i class="fas fa-print me-3"></i> +254 709 933 999</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>

            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->

            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05) !Important!; color: #fff">
                © 2022 Copyright:
                <a class="text-reset fw-bold" href="https://www.aakenya.co.ke/">AUTOMOBILE ASSOCIATION OF KENYA</a>
            </div>

            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
</body>

</html>
