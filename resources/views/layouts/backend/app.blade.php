<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <title>Project Sahakari</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('css/fontawesome-free/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/ion-icons/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminlte/adminlte.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('css/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



</head>

<body>
    @include('sweetalert::alert')
    @yield('header')
    @yield('sidebar')
    @yield('content')
    @yield('footer')
    @yield('script')
</body>

</html>