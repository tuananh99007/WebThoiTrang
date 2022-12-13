<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('assets/admin/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('assets/admin/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('assets/admin/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ asset('assets/admin/plugins/morrisjs/morris.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('assets/admin/css/themes/all-themes.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
</head>

<body class="theme-red">
    <!-- Top Bar -->
    @include('admin.layout.header')
    <!-- #Top Bar -->
    @include('admin.layout.menu')

    <section class="content">
        @yield('main_content')
    </section>
    <!-- Jquery Core Js -->
    <script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap Core Js -->
    <script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.js')}}"></script>
    <!-- Select Plugin Js -->
    <script src="{{asset('assets/admin/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('assets/admin/plugins/node-waves/waves.js')}}"></script>
    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('assets/admin/plugins/jquery-countto/jquery.countTo.js')}}"></script>
    <!-- Morris Plugin Js -->
    <script src="{{asset('assets/admin/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/morrisjs/morris.js')}}"></script>
    <!-- ChartJs -->
    <script src="{{asset('assets/admin/plugins/chartjs/Chart.bundle.js')}}"></script>
    <!-- Flot Charts Plugin Js -->
    <script src="{{asset('assets/admin/plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/flot-charts/jquery.flot.time.js')}}"></script>
    <!-- Sparkline Chart Plugin Js -->
    <script src="{{asset('assets/admin/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('assets/admin/js/admin.js')}}"></script>
    <script src="{{asset('assets/admin/js/pages/index.js')}}"></script>
    <!-- Demo Js -->
    <script src="{{asset('assets/admin/js/demo.js')}}"></script>


</body>

</html>
