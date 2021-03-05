<!doctype html>
<html lang="en">

<head>
  <title>Hello, world!</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  {{-- <link href="{{asset('assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" /> --}}
  <link href="{{asset('assets/css/material-dashboard.min.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/material-dashboard-rtl.css')}}" rel="stylesheet" />
  <script src="{{asset('assets/js/core/bootstrap-material-design.min')}}"></script>
  <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/material-dashboard.min.js')}}"></script>
</head>

<body>
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Admin
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="{{URL::to('admin/dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="{{URL::to('admin/resource/create')}}">
              <i class="material-icons">dashboard</i>
              <p>Tài nguyên & thuộc tính</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="{{URL::to('admin/planet')}}">
              <i class="material-icons">dashboard</i>
              <p>Hành tinh & loại</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="{{URL::to('admin/construction')}}">
              <i class="material-icons">dashboard</i>
              <p>Xây dựng công trình</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="{{URL::to('admin/construction')}}">
              <i class="material-icons">dashboard</i>
              <p>Gian hàng tự bán</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="{{URL::to('admin/military')}}">
              <i class="material-icons">dashboard</i>
              <p>Quân sự</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="{{URL::to('admin/research')}}">
              <i class="material-icons">dashboard</i>
              <p>Nghiên cứu</p>
            </a>
          </li>
          <li class="nav-item active  ">
            <a class="nav-link" href="{{URL::to('admin/research')}}">
              <i class="material-icons">dashboard</i>
              <p>Tài khoản</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">notifications</i> Notifications
                </a>
              </li>
              <!-- your navbar here -->
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
</body>

</html>