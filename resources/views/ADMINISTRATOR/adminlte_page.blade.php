<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>STP Central</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset("/bower_components/bootstrap/dist/css/bootstrap.min.css") }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("/bower_components/font-awesome/css/font-awesome.min.css") }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset("/bower_components/Ionicons/css/ionicons.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset("/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}">
  <!-- fullCalendar 2.2.5-->
  <link href="{{asset("/bower_components/fullcalendar/dist/fullcalendar.min.css")}}" rel="stylesheet" type="text/css" />
  <link href="{{asset("/bower_components/fullcalendar/dist/fullcalendar.print.css")}}" rel="stylesheet" type="text/css" media='print' />
  <!-- Pace style -->
  <link rel="stylesheet" href="{{asset("/bower_components/PACE/themes/white/pace-theme-minimal.css")}}">

  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset("/bower_components/bootstrap-wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css")}}">

  

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- ADDED BY ELMER*** -->
  <link rel="stylesheet" type="text/css" href="{{ asset("/css/daterangepicker.css") }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset("/css/controlToggleBtn.css") }}">

    @yield('custom_style')
    
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" >

  <!-- Main Header -->
  @include('ADMINISTRATOR.header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('ADMINISTRATOR.sidebar')
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="goodload">

    <!-- Main content -->
    <section class="content container-fluid" >
      <style>#goodload{
          /* background-image:url('some-image.jpg'); */
          display:none;
      }</style>

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <!-- Your Page Content Here -->
        @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('ADMINISTRATOR.footer')

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
@push('scripts')
<script>
$(document).ready(function(){
    $('#goodload').fadeIn(500);

  });
  </script>
  @endpush
<!-- jQuery 3 -->
<script src="{{ asset ("/bower_components/jquery/dist/jquery.min.js") }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset ("/bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/admin-lte/dist/js/adminlte.min.js") }}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset ("/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js") }}"></script>
 <!-- fullCalendar 2.2.5 -->
 <script src="{{asset ("/js/moment.min.js")}}"></script>
 <script src="{{asset ("/bower_components/fullcalendar/dist/fullcalendar.min.js")}}" type="text/javascript"></script>
 <!-- PACE -->
 <script src="{{asset ("/bower_components/PACE/pace.min.js")}}"></script>
  <!-- Bootstrap WYSIHTML5 -->
<script src="{{asset ("/bower_components/bootstrap-wysihtml5/dist/bootstrap-wysihtml5-0.0.2.min.js")}}"></script>
<!-- CK Editor -->
<script src="{{asset ("/bower_components/ckeditor/ckeditor.js")}}"></script>
<!-- added by elmer -->

<!-- Date Picker (range)-->

  <script src="{{ asset("/js/daterangepicker.min.js") }}"></script>


@stack('scripts')
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     
</body>
</html>