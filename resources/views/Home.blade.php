<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wis Deket</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">



    <!-- font icons -->
    <link rel="stylesheet" href="{{asset('templatepage/assets/vendors/themify-icons/css/themify-icons.css')}}">
    <!-- Bootstrap + Meyawo main styles -->
    <link rel="stylesheet" href="{{asset('templatepage/assets/css/meyawo.css')}}">


</head>

<body class="hold-transition sidebar-mini">




    <!-- Content Wrapper. Contains page content -->



    <!-- Main content -->
    <div id="app">

        <router-view></router-view>

    </div>
    <!-- /.content -->

    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('template/dist/js/adminlte.min.js')}}"></script>
    <script src="js/app.js"></script>

    <style>
        .jumbotron {
            background-color: #f8f9fa;
        }
    </style>

    <!-- core  -->
    <script src="{{asset('templatepage/assets/vendors/jquery/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('templatepage/assets/vendors/bootstrap/bootstrap.bundle.js')}}"></script>

    <!-- bootstrap 3 affix -->
    <script src="{{asset('templatepage/assets/vendors/bootstrap/bootstrap.affix.js')}}"></script>

    <!-- Meyawo js -->
    <script src="{{asset('templatepage/assets/js/meyawo.js')}}"></script>
    <!-- Vendor JS Files -->

</body>

</html>