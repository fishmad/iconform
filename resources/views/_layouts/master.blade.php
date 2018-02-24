<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
  <title>iConform Worker Safety &amp; Compliance Management System</title>
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
   @stack('head_scripts')
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css"> 
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
</head>

<body class="app header-fixed sidebar-minimized aside-menu-fixed aside-menu-hidden">

  @include('_partials.coreui.header')

  <div class="app-body">

    @include('_partials.coreui.sidebar')

    <main class="main">
      {{--  @include('_partials.coreui.breadcrumbs.body')  --}}

      @include('_partials.flash-alerts')

      <!-- Content -->
      @yield('content')

    </main><!-- /Content -->

    @include('_partials.coreui.asidemenu')

  </div><!-- /.app-body -->

  @include('_partials.coreui.footer')

  <!-- Default: Bootstrap and necessary plugins -->
  <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
  <script src="{{ asset('js/vendor/popper.min.js') }}"></script>
  <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/vendor/pace.min.js') }}"></script>
  <!-- Default: Plugins and scripts required by all views -->
  <script src="{{ asset('js/vendor/Chart.min.js') }}"></script>
  <!-- Default: CoreUI main scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')

  <!-- Autohide/dismiss BS4 Alerts after given time -->
  <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
      });
    }, 4000);
  </script>

  </body>
</html>
