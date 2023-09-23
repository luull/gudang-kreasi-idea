<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ session('config')->name }} | @yield('url-title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="{{ asset(session('config')->logo) }}" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('webfront/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('webfront/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('webfront/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('webfront/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('webfront/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('webfront/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('webfront/css/main.css') }}" rel="stylesheet">
    @yield('custom-css')

</head>

<body>
    @include('webfront.templates.header')
    @yield('content')
    @include('webfront.templates.footer')
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
    @include('webfront.templates.fab')
    <!-- Vendor JS Files -->
    <script src="{{ asset('templates/plugins/font-icons/feather/feather.min.js') }}"></script>
    <script src="{{ asset('webfront/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('webfront/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('webfront/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('webfront/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('webfront/vendor/aos/aos.js') }}"></script>
    @yield('custom-js')
    <!-- Template Main JS File -->
    <script src="{{ asset('webfront/js/main.js') }}"></script>

</body>

</html>
