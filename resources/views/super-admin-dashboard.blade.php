<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Super admin | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
    @include('assets')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->

         </ul>
  </nav>
  <!-- /.navbar -->

  @include('sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Super Admin dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Super Admin Dashboard</li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        @if(session('message'))
        <div class="card">
        <div class="card-body">
        <span class="alert alert-success">{{session('message')}}</span>
        </div>
        </div>

        @endif
        @if(session('warning'))
        <div class="card">
        <div class="card-body">
        <span class="alert alert-danger ">{{session('warning')}}</span>
        </div>
        </div>
        @endif

        <table class="table table-striped table-bordered">
            <th>Name</th><th>Email</th><th>Role</th>
            @foreach ($users as $user)
              <tr><td>{{$user->name}}</td><td>{{$user->email}}</td><td>{{$user->roles[0]->name}}</td></tr>
            @endforeach
            <tr>

        </table>

    </div><!-- /.container-fluid -->

    </div>
    @yield('child_content')
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('ui-components')

</body>
</html>
