<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    @stack('styles')
</head>


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                        <i class="fas fa-user"></i> Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ route('admin.dashboard') }}" class="brand-link">
                <img src="https://placehold.co/40" alt="Logo" class="brand-image img-circle elevation-3"
                    style="opacity:.8">
                <span class="brand-text font-weight-light">Admin Panel</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}"
                                class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <!-- Product Management -->
                        <li
                            class="nav-item has-treeview {{ request()->is('admin/products*') || request()->is('admin/categories*') || request()->is('admin/subcategories*') || request()->is('admin/brands*') || request()->is('admin/colors*') || request()->is('admin/sizes*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ request()->is('admin/products*') || request()->is('admin/categories*') || request()->is('admin/subcategories*') || request()->is('admin/brands*') || request()->is('admin/colors*') || request()->is('admin/sizes*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-box-open"></i>
                                <p>
                                    Product Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.products.index') }}"
                                        class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Products</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.categories.index') }}"
                                        class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.subcategories.index') }}"
                                        class="nav-link {{ request()->routeIs('admin.subcategories.*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Subcategories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.brands.index') }}"
                                        class="nav-link {{ request()->routeIs('admin.brands.*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Brands</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.colors.index') }}"
                                        class="nav-link {{ request()->routeIs('admin.colors.*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Colors</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.sizes.index') }}"
                                        class="nav-link {{ request()->routeIs('admin.sizes.*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sizes</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Web Management -->
                        <li
                            class="nav-item has-treeview {{ request()->is('admin/sliders*') || request()->is('admin/vision-mission*') || request()->is('admin/banners*') ? 'menu-open' : '' }}">
                            <a href="#"
                                class="nav-link {{ request()->is('admin/sliders*') || request()->is('admin/vision-mission*') || request()->is('admin/banners*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-laptop-code"></i>
                                <p>
                                    Web Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#"
                                        class="nav-link {{ request()->is('admin/sliders*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sliders</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        class="nav-link {{ request()->is('admin/vision-mission*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Vision & Mission</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        class="nav-link {{ request()->is('admin/banners*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Banners</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        class="nav-link {{ request()->is('admin/testimonials*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Testimonials</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"
                                        class="nav-link {{ request()->is('admin/pages*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pages</p>
                                    </a>
                                </li>
                            </ul>
                        </li>



                        <!-- Contacts -->
                        <li class="nav-item">
                            <a href="{{ route('admin.contacts.index') }}"
                                class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>Contacts</p>
                            </a>
                        </li>

                        <!-- General Settings -->
                        <li class="nav-item">
                            <a href="{{ route('admin.general-settings.edit') }}"
                                class="nav-link {{ request()->routeIs('admin.general-settings.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>General Settings</p>
                            </a>
                        </li>

                    </ul>
                </nav>

            </div>
        </aside>
        <!-- /.sidebar -->

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <h1 class="m-0">@yield('page-title')</h1>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">Admin Panel</div>
            <strong>&copy; {{ date('Y') }} Medical Equipment Supplier.</strong> All rights reserved.
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')
</body>

</html>
