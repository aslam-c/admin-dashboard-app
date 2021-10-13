<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Dashboard</title>

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
            <h1 class="m-0">Login to your dashboard</h1>
            @if(session('warning'))
            <div class="card-body">
            <span class="alert alert-danger">{{session('warning')}}</span>
            </div>
            @endif

            @if(Session::has('message'))
            <div class="card-body">
            <span class="alert alert-danger">{{session('message')}}</span>
            </div>
            @endif


          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Login</li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <form action="{{url('doLogin')}}" method="POST">
            <label for="email">Email Address</label>
            <input type="email" class="form-control form-cotrol-sm" name='email' placeholder="asd@abc.com" autocomplete="off" required>
            @if($errors->has('email'))
                <span class="text-danger">{{$errors->first('email')}}</span>
            @endif
            <br>
            <label for="password">Password</label>
            <input type="password" class="form-control form-cotrol-sm" name='password' placeholder="********" autocomplete="off" required>
            @if($errors->has('password'))
            <span class="text-danger">{{$errors->first('password')}}</span>
            @endif
            <br>
            <label for="role">User role</label>
            <select name="role" class="form-control form-control-sm">
                @foreach($roles as $role)
                <option value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
            </select>
            @csrf
            <br>
            @if($errors->has('role'))
            <span class="text-danger">{{$errors->first('role')}}</span>
            @endif

            <input type="submit" class="form-control mt-1 btn-primary" value="LogIn">
        </form>
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
