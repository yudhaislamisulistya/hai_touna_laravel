<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/qovex/layouts/vertical/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jul 2020 11:26:21 GMT -->
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- jquery.vectormap css -->
    <link href="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />

    <!-- Summernote css -->
    <link href="{{asset('assets/libs/summernote/summernote-bs4.min.css')}}" rel="stylesheet" type="text/css" />
    
    <!-- DataTables -->
    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body data-layout="detached" data-topbar="colored">

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="container-fluid">
                    <div class="float-right">

                        <div class="dropdown d-inline-block d-lg-none ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">

                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-none d-lg-inline-block ml-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen"></i>
                            </button>
                        </div>

                        
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{asset('assets/images/users/avatar-7.jpg')}}" alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ml-1">{{Auth::user()->name}}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>
                        </div>
                    </div>
                    <div>
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index-2.html" class="logo logo-dark">
                                    <span class="logo-sm">
                                        <img src="{{asset('assets/images/logo.png')}}" alt="" height="50">
                                    </span>
                                <span class="logo-lg">
                                        <img src="{{asset('assets/images/logo.png')}}" alt="" height="50">
                                    </span>
                            </a>

                            <a href="index-2.html" class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="{{asset('assets/images/logo.png')}}" alt="" height="50">
                                    </span>
                                <span class="logo-lg">
                                        <img src="{{asset('assets/images/logo.png')}}" alt="" height="50">
                                    </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-lg-inline-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="bx bx-search-alt"></span>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </header> <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div class="h-100">

                <div class="user-wid text-center py-4">
                    <div class="user-img">
                        <img src="{{asset('assets/images/users/avatar-7.jpg')}}" alt="" class="avatar-md mx-auto rounded-circle">
                    </div>

                    <div class="mt-3">

                        <a href="#" class="text-dark font-weight-medium font-size-16">{{Auth::user()->name}}</a>
                        <p class="text-body mt-1 mb-0 font-size-13">Admin</p>

                    </div>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li>
                            <a href="{{route('viewHome')}}" class=" waves-effect">
                                <i class="mdi mdi-home-modern"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="menu-title">Menu</li>
                        <li>
                            <a href="{{route('viewKuliner')}}" class=" waves-effect">
                                <i class="mdi mdi-shopping-outline"></i>
                                <span>Kuliner</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('viewWisata')}}" class=" waves-effect">
                                <i class="mdi mdi-rv-truck"></i>
                                <span>Wisata</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('viewLoker')}}" class=" waves-effect">
                                <i class="mdi mdi-nature-people"></i>
                                <span>Loker</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('viewBudaya')}}" class=" waves-effect">
                                <i class="mdi mdi-qqchat"></i>
                                <span>Budaya</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('viewOrganisasi')}}" class=" waves-effect">
                                <i class="mdi mdi-rename-box"></i>
                                <span>Organisasi</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('viewKomunitas')}}" class=" waves-effect">
                                <i class="mdi mdi-rhombus-split"></i>
                                <span>Komunitas</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('viewOlehOleh')}}" class=" waves-effect">
                                <i class="mdi mdi-death-star"></i>
                                <span>Oleh - Oleh</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('viewTourGuide')}}" class=" waves-effect">
                                <i class="mdi mdi-directions-fork"></i>
                                <span>Tourguide</span>
                            </a>
                        </li>
                        <li class="menu-title">Lainnya</li>
                        <li>
                            <a href="{{route('viewEvent')}}" class=" waves-effect">
                                <i class="mdi mdi-disqus-outline"></i>
                                <span>Event</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('viewNotifikasi')}}" class=" waves-effect">
                                <i class="mdi mdi-notification-clear-all"></i>
                                <span>Notifikasi</span>
                            </a>
                        </li>
                </div>
                <!-- Sidebar -->
            </div>
        </div>

        @yield('content')

        <!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
{{-- <script src="{{asset('assets/libs/simplebar/simplebar.min.jss')}}"></script> --}}
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
<!-- Summernote js -->
<script src="{{asset('assets/libs/summernote/summernote-bs4.min.js')}}"></script>
<!-- Plugins js -->
<script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>


<!-- apexcharts -->
{{-- <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script> --}}

<!-- jquery.vectormap map -->
<script src="{{asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>

<!-- Required datatable js -->
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<!-- init js -->
<script src="{{asset('assets/js/pages/form-editor.init.js')}}"></script>
<!-- Datatable init js -->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>

<script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>
<script src="https://cdn.tiny.cloud/1/ig8di9cz1xxzwf89x6bwrjtfy1q368sa2l4m3dl9j0356w0c/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

@yield('javascript')

</body>



</html>