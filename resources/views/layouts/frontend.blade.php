<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> @yield( 'title' , env('APP_NAME')) </title>
    @php
        // ToDo: Meta Conten bearbeiten
        $description = str_replace('_', ' ', env('VEREIN_KEYWORDS'));
        $keywords    = str_replace('_', ' ', env('VEREIN_DESCRIPTION'));
    @endphp
    <meta content="{!! $description !!}" name="descriptison">
    <meta content="{!! $keywords !!}"    name="keywordsanlegen">

    <!-- Favicons -->
    <link href="/favicon.ico" rel="icon">
    <link href="/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="/assets/vendor/owl.carousel//assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset("vendor/cookie-consent/css/cookie-consent.css")}}">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Squadfree - v2.2.0
    * Template URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->

    <style>
      @include('textimport.cssColor')
    </style>

</head>

<body>

<x-frontend.header></x-frontend.header>

    {{ $slot }}

<x-frontend.footer></x-frontend.footer>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="/assets/vendor/counterup/counterup.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/vendor/venobox/venobox.min.js"></script>
<script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>

@include('cookie-consent::index');

</body>

</html>
