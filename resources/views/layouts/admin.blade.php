<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title') KPUM</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('adminasset/images/favicon.ico')}}">
        <!-- App css -->
        <link href="{{asset('adminasset/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('adminasset/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('adminasset/css/app.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.7/dist/sweetalert2.min.css">
        @yield('css')
    </head>

    <body>
    @include('sweetalert::alert')
        <!-- Begin page -->
        <div id="wrapper"> 
            <!-- Topbar Start -->
            <div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
                <div class="container-fluid">
                    <!-- LOGO -->
                    <a href="index.html" class="navbar-brand mr-0 mr-md-2 logo">
                        <span class="logo-lg">
                            <img src="a{{asset('adminasset/images/logo.png')}}" alt="" height="24" />
                            <span class="d-inline h5 ml-1 text-logo">KPUM</span>
                        </span>
                        <span class="logo-sm">
                            <img src="{{asset('adminasset/images/logo.png')}}" alt="" height="24">
                        </span>
                    </a>

                    <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
                        <li class="">
                            <button class="button-menu-mobile open-left disable-btn">
                                <i data-feather="menu" class="menu-icon"></i>
                                <i data-feather="x" class="close-icon"></i>
                            </button>
                        </li>
                    </ul>

                    <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">
                         

                        <li class="dropdown notification-list" data-toggle="tooltip" data-placement="left" title="Settings">
                            <a href="javascript:void(0);" class="nav-link right-bar-toggle">
                                <i data-feather="settings"></i>
                            </a>
                        </li>

                        <li class="dropdown notification-list align-self-center profile-dropdown">
                            <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <div class="media user-profile ">
                                    <img src="{{asset('adminasset/images/users/avatar-7.jpg')}}" alt="user-image" class="rounded-circle align-self-center" />
                                    <div class="media-body text-left">
                                        <h6 class="pro-user-name ml-2 my-0">
                                            <span>KPUM</span>
                                            <span class="pro-user-desc text-muted d-block mt-1">Administrator </span>
                                        </h6>
                                    </div>
                                    <span data-feather="chevron-down" class="ml-2 align-self-center"></span>
                                </div>
                            </a>
                            <div class="dropdown-menu profile-dropdown-items dropdown-menu-right">
                                <a href="pages-profile.html" class="dropdown-item notify-item">
                                    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                                    <span>My Account</span>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
                                    <span>Settings</span>
                                </a>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
                                    <span>Support</span>
                                </a>

                                <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                                    <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">
                <div class="media user-profile mt-2 mb-2">
                    <img src="{{asset('adminasset/images/users/avatar-7.jpg')}}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
                    <img src="{{asset('adminasset/images/users/avatar-7.jpg')}}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

                    <div class="media-body">
                        <h6 class="pro-user-name mt-0 mb-0">{{Auth::user()->name}}</h6>
                        <span class="pro-user-desc">Administrator</span>
                    </div>
                    <div class="dropdown align-self-center profile-dropdown-menu">
                        <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false">
                            <span data-feather="chevron-down"></span>
                        </a>
                        <div class="dropdown-menu profile-dropdown">
                            <a href="#" class="dropdown-item notify-item">
                                <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                                <span>My Account</span>
                            </a> 
  
                            <div class="dropdown-divider"></div>

                            <a href="{{url('logout')}}" class="dropdown-item notify-item">
                                <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-content">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="slimscroll-menu">
                        <ul class="metismenu" id="menu-bar">
                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="{{url('/pengelola')}}">
                                    <i data-feather="home"></i> 
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <li class="menu-title">Platform</li>
                            <li>
                                <a href="{{url('pengelola/pemilih')}}">
                                    <i data-feather="calendar"></i>
                                    <span> Daftar Pemilih Tetap </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('pengelola/calon')}}">
                                    <i data-feather="box"></i>
                                    <span> Calon Pemilihan</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('pengelola/angkatan')}}">
                                    <i data-feather="user"></i>
                                    <span> Angkatan </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);">
                                    <i data-feather="inbox"></i>
                                    <span> Hasil Suara </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="email-inbox.html">Inbox</a>
                                    </li>
                                    <li>
                                        <a href="email-read.html">Read</a>
                                    </li>
                                    <li>
                                        <a href="email-compose.html">Compose</a>
                                    </li>
                                </ul>
                            </li> 
                              
                        </ul>
                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
 
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
@yield('content')
@include('layouts.footer') 
            </div>
            </div>
            </div>
        

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
 

        <!-- Vendor js -->
        <script src="{{asset('adminasset/js/vendor.min.js')}}"></script>

        <!-- optional plugins -->
        <script src="{{asset('adminasset/libs/moment/moment.min.js')}}"></script>
        <script src="{{asset('adminasset/libs/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('adminasset/libs/flatpickr/flatpickr.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.7/dist/sweetalert2.all.min.js"></script>

        <!-- page js -->
        <script src="{{asset('adminasset/js/pages/dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('adminasset/js/app.min.js')}}"></script>

@yield('js')
    </body>
</html>