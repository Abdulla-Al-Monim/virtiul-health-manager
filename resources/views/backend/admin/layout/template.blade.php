<!DOCTYPE html>
<html lang="en">
<head>
  @include('backend.admin.includes.header')
  @include('backend.admin.includes.css')

  
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  @include('backend.admin.includes.topbar')
  <!-- Navbar end-->
  <!-- Main Sidebar Container -->
  @include('backend.admin.includes.nav')
   <!-- Main Sidebar Container end-->
  <!-- Content Wrapper. Contains page content -->
  @yield('dashboard-content')
  <!-- /.content-wrapper -->
  @include('backend.admin.includes.footer')

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('backend.admin.includes.script')
</body>
</html>
