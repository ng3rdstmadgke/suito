<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- AdminLTE -->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/adminlte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="{{ asset('/adminlte/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <script src="{{ asset('/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/adminlte/dist/js/adminlte.min.js') }}"></script>
</head>
<body class="skin-green">
  <div class="wrapper">
    @guest
      @component('layouts.guest-menu')
      @endcomponent
    @else
      @component('layouts.menu')
      @endcomponent
    @endguest
    <div class="content-wrapper">
      <div class="container-fluid">
        <section class="content-header">
          <h1>Page Name<small>Control panel</small></h1>
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">List</a></li>
          </ol>
        </section>
        <section class="content">
        @yield('content')
        </section>
      </div>
    </div>
  </div>
</body>
</html>
