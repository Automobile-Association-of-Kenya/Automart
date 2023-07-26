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
    @yield('main')
</body>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
@yield('footer_scripts')

</html>
