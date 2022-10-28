<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prism.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen"> 
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    @yield('styles')

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
   <!-- page-wrapper Start-->
   <div class="page-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-main-header">
      <div class="main-header-right row m-0">
        <div class="main-header-left">
          <div class="logo-wrapper">
            <a href="index.html"><img class="img-fluid" src="{{ asset('assets/images/cropped-Praise.png')}}" alt="" style="max-width: 33px"></a></div>
          <div class="dark-logo-wrapper">
            <a href="index.html"><img class="img-fluid" src="{{ asset('assets/images/cropped-Praise.png')}}"  style="max-width: 33px"></a></div>
          <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
        </div>
        <div class="left-menu-header col">
          <ul>
            <li>
              <form class="form-inline search-form">
                <div class="search-bg"><i class="fa fa-search"></i>
                  <input class="form-control-plaintext" placeholder="Search here.....">
                </div>
              </form><span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
            </li>
          </ul>
        </div>
        <div class="nav-right col pull-right right-menu p-0">
          <ul class="nav-menus">
            <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
            <li>
              <div class="mode"><i class="fa fa-moon-o"></i></div>
            </li>
          </ul>
        </div>
        <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
      </div>
    </div>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper horizontal-menu">
      <!-- Page Sidebar Start-->
      <header class="main-nav">
        <div class="sidebar-user text-center">
            <img class="img-90 rounded-circle" src="{{ asset('assets/images/cropped-Praise.png')}}" alt="">
          <div class="badge-bottom"></div><a href="#">
            <h6 class="mt-3 f-14 f-w-600">Praise Atmosphere</h6></a>
          <p class="mb-0 font-roboto">Manage Events</p>
        </div>
        <nav>
          <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">           
              <ul class="nav-menu custom-scrollbar">
                <li class="back-btn">
                  <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                </li>
                <li class="sidebar-main-title">
                  <div>
                    <h6>Events</h6>
                  </div>
                </li>
                <li class="dropdown">          <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="box"></i><span>Events                </span></a>
                  <ul class="nav-submenu menu-content">
                    <li><a href="{{ route('events.list') }}">Events List</a></li>
                    <li><a href="{{ route('events.create') }}">Create new Event</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('tickets.all') }}"><i data-feather="printer"></i></i><span>All Tickets</span></a></li>
                <li class="dropdown"><a class="nav-link menu-title link-nav" href="{{ route('payments.all') }}"><i data-feather="credit-card"></i><span>Payments</span></a></li>
                <li><a class="nav-link menu-title link-nav" href="support-ticket.html"><i data-feather="headphones"></i><span>Support Ticket</span></a></li>
              </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
          </div>
        </nav>
      </header>
      <!-- Page Sidebar Ends-->
      @yield('content')
      <!-- footer start-->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 footer-copyright">
              <p class="mb-0">Copyright 2021-22 © Buenevue.</p>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
    <script src="{{ asset('assets/js/height-equal.js') }}"></script>
    @yield('scripts')
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
