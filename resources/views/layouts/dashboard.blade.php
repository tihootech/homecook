<!DOCTYPE html>
<html lang="fa">

<head>

    <title> خونه پز - @yield('title') </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="root" content="{{ url('/') }}">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('favicon/favicon.ico')}}">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="{{asset("dashboard/css/font-awesome.min.css")}}">

    <!-- Main CSS-->
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset("dashboard/css/pdp.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("dashboard/css/dashmain.css?v=1.2")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("dashboard/css/dashcustom.css")}}">

</head>

<body class="app sidebar-mini rtl">

    @include("dashboard.header")
    @include("dashboard.aside")

    <main class="app-content">


        @include('dashboard.partials.errors_and_messages')
        @yield('content')

    </main>

    <!-- Essential javascripts for application to work-->
    <script src="{{asset("dashboard/js/jquery-3.2.1.min.js")}}"></script>
    <script src="{{asset("dashboard/js/jq-ui.js")}}"></script>
    <script src="{{asset("dashboard/js/popper.min.js")}}"></script>
    <script src="{{asset("dashboard/js/bootstrap.min.js")}}"></script>

    <!-- Plugins -->
    <script src="{{asset("dashboard/js/plugins/pace.min.js")}}"></script>
    <script src="{{asset("dashboard/js/plugins/sweetalert.min.js")}}"></script>
    <script src="{{asset("dashboard/js/plugins/select2.min.js")}}"></script>

    <!-- Main -->
    <script src="{{asset("dashboard/js/cats-treeview.js")}}"></script>
    <script src="{{asset("dashboard/js/pdp.min.js")}}"></script>
    <script src="{{asset("dashboard/js/stars.min.js")}}"></script>
    <script src="{{asset("dashboard/js/dashmain.js")}}"></script>
    <script src="{{asset("dashboard/js/dashcustom.js")}}"></script>
    <script src="{{asset("js/general.js")}}"></script>
    <script src="{{asset("dashboard/js/plugins/chart.js")}}"></script>

    @yield('charts')

</body>

</html>
