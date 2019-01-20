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
  <link href="{{ asset('/AdminLTE-2.4.5/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/AdminLTE-2.4.5/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/AdminLTE-2.4.5/bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/AdminLTE-2.4.5/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('/AdminLTE-2.4.5/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
  <script src="{{ asset('/AdminLTE-2.4.5/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('/AdminLTE-2.4.5/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/AdminLTE-2.4.5/dist/js/adminlte.min.js') }}"></script>
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
