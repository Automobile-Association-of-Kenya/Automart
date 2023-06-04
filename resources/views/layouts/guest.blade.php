<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>@yield('title') | AA Kenya Limited</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('css/skins/yellow.css') }}">
    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    @yield('header_styles')
</head>

<body>
    <div class="contact-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 col-md-12 bg-img">
                    <div class="informeson">
                        <div class="typing">
                            <h1 class="text-white">Welcome To AutoMart</h1>
                        </div>
                        <p>At our platform, we bring together a vast selection of high-quality cars and a wide range of accessories from trusted manufacturers and sellers. From sleek sedans to rugged SUVs, we offer a diverse inventory of vehicles to suit every style and preference. </p>
                        <div class="social-list">
                            <div class="buttons">
                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                                <a href="#" class="dribbble-bg"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('main')

            </div>
        </div>
    </div>
    </div>

</body>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
@yield('footer_scripts')

</html>
