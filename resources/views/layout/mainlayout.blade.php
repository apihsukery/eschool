<!DOCTYPE html>
<html lang="en">

<head>
@include('layout.partials.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{!! asset('AdminLTE/dist/img/AdminLTELogo.png') !!}" alt="AdminLTELogo" height="60" width="60">
  </div>

  @include('layout.partials.navbar')

  <!-- Main Sidebar Container -->
  @include('layout.partials.sidebar')

  @yield('content')

  @include('layout.partials.footer')
  
</div>
<!-- ./wrapper -->

@include('layout.partials.footer-script')

</body>
</html>
