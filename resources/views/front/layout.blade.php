<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> @yield('title') - Thầy Tâm toán</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    @yield('head')

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/toast-plugin.js') }}"></script>
    <script src="{{ asset('assets/js/toast-plugin-min.js') }}"></script>

</head>

<body>
    <!-- Header -->
    @section('header')
        @include('front.components.header')
    @show

    <!-- Sidebar -->
    @section('sidebar')
        @include('front.components.sidebar')
    @show
    <!-- Main content -->
    @yield('content')
    <!-- Footer -->
    @section('footer')
        @include('front.components.footer')
    @show

    <!-- End footer-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/common.js') }}"></script>

</body>

</html>
