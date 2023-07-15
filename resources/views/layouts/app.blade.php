<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | AA Kenya Limited</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-submenu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jnoty.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


    <link rel="stylesheet" type="text/css"  href="{{ asset('css/lightbox.min.css') }}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('css/skins/yellow.css') }}">
     --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-submenu.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons/style.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/lightbox.min.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css/jnoty.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('css/skins/yellow.css') }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/some.css') }}">
    @yield('header_styles')
</head>

<body>
    <header class="main-header sticky-header sh-2">
        @include('layouts.header')
    </header>
    @include('sidebar')

    @yield('main')

    @include('layouts.footer')

    <div id="full-page-search">
        <button type="button" class="close">×</button>
        <form action="" class="full-page-search-inner">
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-sm button-theme">Search</button>
        </form>
    </div>

    <div class="car-model-2">
        <div class="modal fade" id="vehicleDetailsModal" tabindex="-1" role="dialog"
            aria-labelledby="carOverviewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" id="vehiclePreviewSection">

                </div>
            </div>
        </div>
    </div>

    <div class="car-model-2">
        <div class="modal fade" id="carOverviewModal" tabindex="-1" role="dialog"
            aria-labelledby="carOverviewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title" id="carOverviewModalLabel">
                            <h4>Find Your Dream Car</h4>
                            <h5><i class="flaticon-pin"></i> 123 Kathal St. Tampa City,</h5>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row modal-raw">
                            <div class="col-lg-6 modal-left">
                                <div class="item active">
                                    <img src="img/car-11.jpg" alt="best-car" class="img-fluid">
                                    <div class="sobuz">
                                        <div class="price-box">
                                            <span class="del"><del>$950.00</del></span>
                                            <br>
                                            <span class="del-2">$1050.00</span>
                                        </div>
                                        <div class="ratings-2">
                                            <span class="ratings-box">4.5/5</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            ( 7 Reviews )
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 modal-right">
                                <div class="modal-right-content">
                                    <section>
                                        <h3>Features</h3>
                                        <div class="features">
                                            <ul class="bullets">
                                                <li>Cruise Control</li>
                                                <li>Airbags</li>
                                                <li>Air Conditioning</li>
                                                <li>Alarm System</li>
                                                <li>Audio Interface</li>
                                                <li>CDR Audio</li>
                                                <li>Seat Heating</li>
                                                <li>ParkAssist</li>
                                            </ul>
                                        </div>
                                    </section>
                                    <section>
                                        <h3>Overview</h3>
                                        <ul class="bullets">
                                            <li>Model</li>
                                            <li>Year</li>
                                            <li>Condition</li>
                                            <li>Price</li>
                                            <li>Audi</li>
                                            <li>2020</li>
                                            <li>Brand New</li>
                                            <li>$178,000</li>
                                        </ul>
                                    </section>
                                    <div class="description">
                                        <h3>Description</h3>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard.</p>
                                        <a href="car-details.html" class="btn btn-md btn-round btn-theme">Show
                                            Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-submenu.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/rangeslider.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ asset('js/lightgallery-all.js') }}"></script>
    <script src="{{ asset('js/jnoty.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script> --}}


<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script  src="{{ asset('js/bootstrap-submenu.js') }}"></script>
<script src="{{ asset('js/rangeslider.min.js') }}"></script>
<script  src="{{ asset('js/rangeslider.js') }}"></script>
<script  src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script  src="{{ asset('js/jquery.scrollUp.js') }}"></script>
<script  src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script  src="{{ asset('js/slick.min.js') }}"></script>
<script  src="{{ asset('js/jquery.filterizr.js') }}"></script>
<script  src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script  src="{{ asset('js/jquery.countdown.js') }}"></script>
<script  src="{{ asset('js/jquery.mousewheel.min.js') }}"></script>
<script  src="{{ asset('js/lightgallery-all.js') }}"></script>
<script  src="{{ asset('js/jnoty.js') }}"></script>
<script  src="{{ asset('js/sidebar.js') }}"></script>
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script  src="{{ asset('js/app.js') }}"></script>

    @yield('footer_scripts')

</body>

</html>
