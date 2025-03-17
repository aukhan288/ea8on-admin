
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
<!-- #00A789 -->
  <title>{{ env('APP_NAME', 'DefaultAppName') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  

  <!-- Favicons -->
  <link href="{{ asset('images/logo.png') }}" rel="icon">


  <!-- Vendor CSS Files -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{ asset('css/datatable.css') }}" rel="stylesheet">
  <link href="{{ asset('css/sweetalert2.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/datatable.js') }}"></script>
  <script src="{{ asset('js/sweetalert2.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <style>
.dt-paging {
  display: inline-block;
  padding-left: 0;
  margin: 20px 0;
  border: 1px solid rgba(1, 41, 112, 0.1);
  border-radius: 5px;
}
.current{
  background: #001e54 !important;
  color: #FFF !important;
}
div.dt-container .dt-paging .dt-paging-button.current, div.dt-container .dt-paging .dt-paging-button.current:hover {
  color: #FFF !important;
  border: 0px solid transparent;
  border: none !important;
}
div.dt-container .dt-paging .dt-paging-button.current, div.dt-container .dt-paging .dt-paging-button.current {
  color: #FFF !important;
  border: 0px solid transparent;
  margin-left: 0px !important;
  border: none !important;
}
div.dt-container .dt-paging .dt-paging-button {
    /* box-sizing: border-box; */
    display: inline-block;
    min-width: 1em;
    padding: 0.3em 0.65em;
    /* margin-left: 2px; */
    text-align: center;
    text-decoration: none !important;
    cursor: pointer;
    color: inherit !important;
    border: 0px solid transparent;
    /* border-radius: 2px; */
    background: transparent;
}
.current:hover{
  background: #001e54 !important;
  color: #FFF !important;
  border: 0px solid transparent;
}
.dt-paging-button{
  color: #FFF !important;
}
.dt-paging-button:hover{
  color: #FFF !important;
  background: #001e54 !important;
}
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
    <i class="bi bi-list toggle-sidebar-btn m-0"></i>
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="">
      </a>
      
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell-fill"></i>
          </a><!-- End Notification Icon -->      
        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item" >
        <a class="nav-link  collapsed " href="{{ url('/admin/home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item" >
        <a class="nav-link {{ request()->is('admin/categories') ? 'current' : '' }}" href="{{ url('/admin/categories') }}">
        <i class="bi bi-list"></i>
          <span>Category</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item" >
        <a class="nav-link collapsed" href="{{ url('/admin/sub-categories') }}">
        <i class="bi bi-list"></i>
          <span>Sub Category</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      <li class="nav-item">
        <a class="nav-link  {{ request()->is('admin/products') ? 'current' : '' }}" href="{{ url('/admin/products') }}">
          <i class="bi bi-people"></i>
          <span>Products</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link  {{ request()->is('admin/sides') ? '' : 'collapsed' }}" href="{{ url('/admin/sides') }}">
          <i class="bi bi-people"></i>
          <span>Sides</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item" >
        <a class="nav-link {{ request()->is('admin/banners') ? '' : 'collapsed' }}" href="{{ url('/admin/banners') }}">
        <i class="bi bi-list"></i>
          <span>Banners</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link  {{ request()->is('admin/users') ? '' : 'collapsed' }}" href="{{ url('/admin/users') }}">
          <i class="bi bi-people"></i>
          <span>Customers</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/admin/orders') }}">
          <i class="bi bi-people"></i>
          <span>Orders</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/admin/delivery-boys') }}">
          <i class="bi bi-people"></i>
          <span>Delivery Boys</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
  <div class="pagetitle mb-5">
      <h1>{{$title??''}}</h1>
    </div>
    <section class="section">
     @yield('content')
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

 

  <!-- Template Main JS File -->


</body>

</html>