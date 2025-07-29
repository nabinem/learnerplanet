<!DOCTYPE html>
 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
        <link rel="stylesheet" href="{{ asset("plugins/OverlayScrollbars/overlayscrollbars.min.css") }}">
        @stack('pluginCss')
        <link href="{{ asset('css/styles-app.css') }}" rel="stylesheet">
        @stack('css')
    </head>
    <body class="layout-fixed sidebar-expand-lg sidebar-mini bg-body-tertiary">
      <div class="app-wrapper"> 
        <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body"> 
            <!--begin::Container-->
            <div class="container-fluid"> 
                <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item"> 
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> 
                            <i class="bi bi-list"></i> 
                        </a> 
                    </li>
                 </ul>
                <ul class="navbar-nav ms-auto">
                    <!--begin::Notifications Dropdown Menu-->
                    <li class="nav-item dropdown"> 
                        <a class="nav-link" data-bs-toggle="dropdown" href="#"> 
                            <i class="bi bi-bell-fill"></i> 
                            <span class="navbar-badge badge text-bg-warning">15</span> 
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> 
                            <span class="dropdown-item dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div> 
                            <a href="#" class="dropdown-item"> 
                                <i class="bi bi-envelope me-2"></i> 4 new messages
                                <span class="float-end text-secondary fs-7">3 mins</span> 
                            </a>
                            <div class="dropdown-divider"></div> 
                            <a href="#" class="dropdown-item"> 
                                <i class="bi bi-people-fill me-2"></i> 8 new courses
                                <span class="float-end text-secondary fs-7">12 hours</span> 
                            </a>
                            <div class="dropdown-divider"></div> 
                            <a href="#" class="dropdown-item"> 
                                <i class="bi bi-file-earmark-fill me-2"></i> 3 new reports
                                <span class="float-end text-secondary fs-7">2 days</span> 
                            </a>
                            <div class="dropdown-divider"></div> 
                            <a href="#" class="dropdown-item dropdown-footer">
                                See All Notifications
                            </a>
                        </div>
                    </li> 
                    <!--end::Notifications Dropdown Menu-->
                    <!--begin::User Menu Dropdown-->
                   
                    <li class="nav-item dropdown user-menu"> 
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> 
                            <i class="bi bi-person-fill"></i>
                            <span class="d-none d-md-inline">{{ auth()->user()->name }}</span> 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> 
                            <li class="user-header text-bg-primary">
                                <p>
                                    {{ auth()->user()->name }}
                                    <small>
                                        Member since {{ auth()->user()->created_at->isoFormat('MMMM. YYYY') }}
                                    </small>
                                </p>
                            </li>
                            <li class="user-body">
                                <div class="row">
                                    <div class="col"> 
                                        <a href="#">
                                            <i class="bi bi-gear-fill"></i>  Settings
                                        </a> 
                                    </div>
                                </div>
                            </li>
                            <li class="user-body">
                                <div class="row">
                                    <div class="col"> 
                                        <a href="#">
                                            <i class="bi bi-credit-card-2-back"></i>  Pricings
                                        </a> 
                                    </div>
                                </div>
                            </li>
                            <li class="user-body">
                                <div class="row">
                                    <div class="col"> 
                                        <a href="#">
                                            <i class="nav-icon bi bi-question-circle-fill"></i>  Help Documents
                                        </a> 
                                    </div>
                                </div>
                            </li>
                            <li class="user-body">
                                <div class="row">
                                    <div class="col"> 
                                        <a href="#">
                                            <i class="bi bi-person-circle"></i> Support
                                        </a> 
                                    </div>
                                </div>
                            </li>
                            <li class="user-body">
                                <div class="row">
                                    <div class="col"> 
                                        <a href="#">
                                            <i class="bi bi-pencil-fill"></i> Change Password
                                        </a> 
                                    </div>
                                </div>
                            </li>
                            <li class="user-body">
                                <div class="row">
                                    <div class="col"> 
                                        <a href="#">
                                            <i class="bi bi-pencil-square"></i> Edit Profile
                                        </a> 
                                    </div>
                                </div>
                            </li>
                            <!--begin::Menu Footer-->
                            <li class="user-footer text-center">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button 
                                        type="submit"
                                        class="btn btn-default btn-flat float-end cursor-pointer btn-focus-border-none"
                                    >
                                        Sign out
                                    </button>
                                </form>
                            </li> 
                            <!--end::Menu Footer-->
                        </ul>
                    </li> <!--end::User Menu Dropdown-->
                   
                </ul> <!--end::End Navbar Links-->
            </div> <!--end::Container-->
        </nav> <!--end::Header--> 
        <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
            <div class="sidebar-brand"> 
              <a href="{{ url('dashboard') }}" class="brand-link"> 
                <img src="{{ asset("images/logo-icon-white.png") }}" alt="Logo" class="brand-image opacity-75 shadow">
                <span class="brand-text fw-light">Learner Planet</span>
              </a>
            </div>
            <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2"> <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item"> 
                            <a href="{{ url('dashboard') }}" 
                                @class([
                                    'nav-link',
                                    'active' => request()->routeIs('dashboard')
                                ])
                            > 
                                <i class="nav-icon bi bi-house-door-fill"></i>
                                <p> Home </p>
                            </a>
                        </li>
                        <li @class([
                            'nav-item',
                            'menu-open' => request()->routeIs([
                                'courses.*',
                            ])
                        ])>
                            <a href="#" class="nav-link"> 
                                <i class="nav-icon bi bi-ui-checks-grid"></i>
                                <p>
                                    Create & Launch
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"> 
                                    <a href="#" class="nav-link"> 
                                        <i class="nav-icon bi bi-speedometer"></i>
                                        <p> Dashboard</p>
                                    </a> 
                                </li>
                                <li class="nav-item"> 
                                    <a href="{{ route('courses.index') }}" 
                                        @class([
                                            'nav-link',
                                            'active' => request()->routeIs(['courses.index', 'courses.edit'])
                                        ])
                                    > 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p> My Created Courses</p>
                                    </a> 
                                </li>
                                <li class="nav-item"> 
                                    <a href="{{ route('courses.create') }}" 
                                        @class([
                                            'nav-link',
                                            'active' => request()->routeIs('courses.create')
                                        ])
                                    > 
                                        <i class="nav-icon bi bi-plus-circle"></i>
                                        <p> Create A New Course </p>
                                    </a> 
                                </li>
                                <li class="nav-item"> 
                                    <a href="#" class="nav-link"> 
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p> My Purchased Courses</p>
                                    </a> 
                                </li>
                                <li class="nav-item"> 
                                    <a href="#" class="nav-link"> 
                                        <i class="nav-icon bi bi-plus-circle"></i>
                                        <p> Opt in Pages</p>
                                    </a> 
                                </li>
                                <li class="nav-item"> 
                                    <a href="#" class="nav-link"> 
                                        <i class="nav-icon bi bi-plus-circle"></i>
                                        <p> Upsell Pages</p>
                                    </a> 
                                </li>
                                <li class="nav-item"> 
                                    <a href="#" class="nav-link"> 
                                        <i class="nav-icon bi bi-plus-circle"></i>
                                        <p> Confirmation Pages</p>
                                    </a> 
                                </li>
                                <li class="nav-item"> 
                                    <a href="#" class="nav-link"> 
                                        <i class="nav-icon bi bi-plus-circle"></i>
                                        <p> Public Directory </p>
                                    </a> 
                                </li>
                                <li class="nav-item"> 
                                    <a href="#" class="nav-link"> 
                                        <i class="nav-icon bi bi-plus-circle"></i>
                                        <p> My Directory </p>
                                    </a> 
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div> 
            <!--end::Sidebar Wrapper-->
        </aside> 
        <!--end::Sidebar--> 
        <!--begin::App Main-->
        <main class="app-main"> 
            @include('partials.alert')
            
            {{ $slot }}
        </main> 
        <!--end::App Main--> 
        <!--begin::Footer-->
        <footer class="app-footer"> 
            <div class="float-end d-none d-sm-inline">
                <strong> Copyright &copy; {{ date('Y') }} &nbsp;
                    <a href="{{ url('/') }}" class="text-decoration-none">
                        {{ config('app.name') }}.
                    </a>
                </strong>
                All rights reserved.
            </div>
        </footer> 
        <!--end::Footer-->
    </div>
        @include('partials.footer')
        @stack('pluginScripts')

        <script src="{{ asset('js/main-app.js') }}"></script>
        @stack('scripts')

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

    </body>
   
</html>

