<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Admin page</title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE v4 | Dashboard">
    <meta name="author" content="ColorlibHQ">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"><!--end::Primary Meta Tags-->
    <link rel="shortcut icon" href="/images/erlass.png">
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="/css/adminlte.css"><!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head> <!--end::Head--> <!--begin::Body-->
<style>
    .nav-item p{
        color: white;
        font-weight: bold;
    }
    .nav-icon {
        margin-right: 8px; /* Menambahkan jarak antara ikon dan teks */
        font-size: 1.2em; /* Ukuran ikon yang lebih besar jika perlu */
    }

    /* Menambahkan efek hover pada ikon */
    .nav-link:hover .nav-icon {
        color: #007bff; /* Ubah warna ikon saat hover */
    }

    #loadingIndicator {
        font-weight: bold;
        color: #007bff; /* Bootstrap primary color */
        margin-top: 10px;
    }

    .app-sidebar {
        background: #4e54c8; /* Set the background color for the sidebar */
        background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8 ); /* Gradient background */
        width: 250px; /* Set the width of the sidebar */
        height: 100vh; /* Full height */
        position: fixed; /* Fixed position */
        overflow: hidden; /* Prevent overflow */
    }

    .circles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0; /* Ensure circles are behind other content */
    }

    .circles li {
        position: absolute;
        display: block;
        list-style: none;
        width: 20px;
        height: 20px;
        background: rgba(255, 255, 255, 0.2);
        animation: animate 25s linear infinite;
        bottom: -150px;
    }

    .circles li:nth-child(1) { left: 25%; width: 80px; height: 80px; animation-delay: 0s; }
    .circles li:nth-child(2) { left: 10%; width: 20px; height: 20px; animation-delay: 2s; animation-duration: 12s; }
    .circles li:nth-child(3) { left: 70%; width: 20px; height: 20px; animation-delay: 4s; }
    .circles li:nth-child(4) { left: 40%; width: 60px; height: 60px; animation-delay: 0s; animation-duration: 18s; }
    .circles li:nth-child(5) { left: 65%; width: 20px; height: 20px; animation-delay: 0s; }
    .circles li:nth-child(6) { left: 75%; width: 110px; height: 110px; animation-delay: 3s; }
    .circles li:nth-child(7) { left: 35%; width: 150px; height: 150px; animation-delay: 7s; }
    .circles li:nth-child(8) { left: 50%; width: 25px; height: 25px; animation-delay: 15s; animation-duration: 45s; }
    .circles li:nth-child(9) { left: 20%; width: 15px; height: 15px; animation-delay: 2s; animation-duration: 35s; }
    .circles li:nth-child(10) { left: 85%; width: 150px; height: 150px; animation-delay: 0s; animation-duration: 11s; }

    @keyframes animate {
        0% { transform: translateY(0) rotate(0deg); opacity: 1; border-radius: 0; }
        100% { transform: translateY(-1000px) rotate(720deg); opacity: 0; border-radius: 50%; }
    }

</style>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper"> <!--begin::Header-->
        <!--begin::Navbar-->
        <nav class="app-header navbar navbar-expand bg-body"> 
            <div class="container-fluid"> 
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
                </ul> 
                <ul class="navbar-nav ms-auto"> 
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : '/lte/dist/assets/img/user2-160x160.jpg' }}" class="user-image rounded-circle shadow" alt="User  Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <li class="user-header text-bg-primary">
                                <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : '/lte/dist/assets/img/user2-160x160.jpg' }}" class="rounded-circle shadow" alt="User  Image">
                                <p>
                                    {{ Auth::user()->name }} - {{ Auth::user()->role }}
                                    <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <a href="{{ route('admin.profile.show') }}" class="btn btn-default btn-flat">Profile</a>
                            </li>
                        </ul>
                    </li>
                </ul> 
            </div> 
        </nav> 
        <!--end::Navbar-->
        <!--end::Header--> 
        <!--begin::Sidebar-->
        <aside class="app-sidebar"> 
            <ul class="circles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
            <div class="sidebar-brand"> 
                <a href="{{ route('admin.dashboard') }}" class="brand-link"> 
                    <img src="/images/admin.png" alt="Admin Page" class="brand-image opacity-75 shadow"> 
                    <span style="color: white; font-weight: bold;" class="brand-text">Admin Page</span> 
                </a> 
            </div> 
            <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <!-- Menu Dashboard sebagai tombol -->
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <i style="color: white;" class="nav-icon bi bi-speedometer"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        
                        <!-- Menu User -->
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}" class="nav-link {{ request()->routeIs('admin.user.index') ? 'active' : '' }}">
                                <i style="color: white;" class="nav-icon fa-solid fa-user"></i>
                                <p>User</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('admin.upload') }}" class="nav-link">
                                <i style="color: white;" class="nav-icon fas fa-upload"></i>
                                <p>Upload Media</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('admin.media.index') }}" class="nav-link {{ request()->routeIs('admin.media.index') ? 'active' : '' }}">
                                <i style="color: white;" class="nav-icon fas fa-images"></i>
                                <p>Media</p>
                            </a>
                        </li>
                        
                        <!-- Menu Auth -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color: white;"class="nav-icon bi bi-box-arrow-in-right"></i>
                                <p>
                                    Auth
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <!-- Logout Option -->
                                <li class="nav-item">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i style="color: white;" class="nav-icon bi bi-box-arrow-right"></i>
                                        <p>Logout</p>
                                    </a>
                                </li>
                            </ul>
                        </li>                        
                    </ul>
                    <!--end::Sidebar Menu-->
                </nav>                                                                                             
            </div> 
            <!--end::Sidebar Wrapper-->
        </aside> 
        <!--end::Sidebar--> 
        <!--begin::App Main-->
        @yield('content') 
        <!--end::App Main--> 
        <!--begin::Footer-->
        <footer class="app-footer"> 
            <!--begin::To the end-->
        </footer> 
        <!--end::Footer-->
    </div> 
    <!--end::App Wrapper--> 
    <!--begin::Script--> 
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> 
    <!--end::Third ```html
    Party Plugin(OverlayScrollbars)-->
    <!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> 
    <!--end::Required Plugin(popperjs for Bootstrap 5)-->
    <!--begin:: Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> 
    <!--end::Required Plugin(Bootstrap 5)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <script src="/js/adminlte.js"></script> 
    <!--end::Required Plugin(AdminLTE)-->
    <!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script> 
    <!--end::OverlayScrollbars Configure--> 
    <!-- OPTIONAL SCRIPTS --> 
    <!-- sortablejs -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js" integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ=" crossorigin="anonymous"></script> 
    <!-- sortablejs -->
</body><!--end::Body-->
</html>