<!doctype html>
<html lang="en" class="fixed left-sidebar-top">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Ashian Admin</title>
    <!--load progress bar-->
    <script src="{{ asset('backend/vendor/pace/pace.min.js') }}"></script>
    <link href="{{ asset('backend/vendor/pace/pace-theme-minimal.css') }}" rel="stylesheet" />
    <link href="{{ asset('https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css') }}"
        rel="stylesheet">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/animate.css/animate.css') }}">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    {{--
    <link rel="stylesheet" href="{{ asset('backend/vendor/toastr/toastr.min.css') }}"> --}}
    <!--Magnific popup-->
    <link rel="stylesheet" href="{{ asset('backend/vendor/magnific-popup/magnific-popup.css') }}">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('backend/stylesheets/css/style.css') }}">


</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <h3 style="color:wheat;" href="index.html" class="on-click">
                       Ashian
                    </h3>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open"
                    data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                <!--SEARCH HEADERBOX-->
                <div class="header-section" id="search-headerbox">
                    <input type="text" name="search" id="search" placeholder="Search...">
                    <i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>
                    <div class="header-separator"></div>
                </div>

                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">

                        <div class="user-info">
                            <span class="user-name">{{ Session::get('admin_name') }}</span>
                            <span class="user-profile">Admin</span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href="{{ route('admin-logout') }}"><i class="fa fa-sign-out"
                                            aria-hidden="true"></i>
                                        Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="pages_sign-in.html" data-toggle="tooltip" data-placement="left" title="Logout"><i
                            class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title" style="color: orange">Ashian Admin Panal</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs"
                        data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <li class="{{ request()->is('dashboard') ? 'active-item' : '' }}"><a
                                        href="{{ route('home') }}"><i class="fa fa-home"
                                            aria-hidden="true"></i><span>Dashboard</span></a></li>

                                <!--CHARTS-->
                                <li
                                    class="has-child-item close-item {{ request()->is('category/*') ? 'open-item' : '' }}">
                                    <a><i class="fa fa-bars" aria-hidden="true"></i><span>Category</span> </a>
                                    <ul class="nav child-nav level-1">
                                        <li class="{{ request()->is('category/add-category') ? 'active-item' : '' }}"><a
                                                href="{{ route('add-category') }}">Add Category</a></li>
                                        <li
                                            class="{{ request()->is('category/manage-category') ? 'active-item' : '' }}">
                                            <a href="{{ route('manage-category') }}">Manage Category</a>
                                        </li>
                                    </ul>
                                </li>
                                <!--CHARTS-->
                                <li
                                    class="has-child-item close-item {{ request()->is('product/*') ? 'open-item' : '' }}">
                                    <a><i class="fa fa-bars" aria-hidden="true"></i><span>Product</span> </a>
                                    <ul class="nav child-nav level-1">
                                        <li class="{{ request()->is('product/add-product') ? 'active-item' : '' }}"><a
                                                href="{{ route('add-product') }}">Add Product</a></li>
                                        <li class="{{ request()->is('product/manage-product') ? 'active-item' : '' }}">
                                            <a href="{{ route('manage-product') }}">Manage Product</a>
                                        </li>
                                    </ul>
                                </li>
                                <!--CHARTS-->
                                <!--
                                     <li
                                    class="has-child-item close-item {{ request()->is('message/*') ? 'open-item' : '' }}">
                                    <a><i class="fa fa-bars" aria-hidden="true"></i><span>Hero Section</span> </a>
                                    <ul class="nav child-nav level-1">
                                        <li class="{{ request()->is('message/add-message') ? 'active-item' : '' }}"><a
                                                href="{{ route('add-message') }}">Add Message</a></li>
                                        <li class="{{ request()->is('message/manage-message') ? 'active-item' : '' }}">
                                            <a href="{{ route('manage-message') }}">Manage Message</a>
                                        </li>
                                    </ul>
                                </li>

                                -->
                               
                                <!--CHARTS-->
                                <li <ul class="nav child-nav level-1">
                                <li class="{{ request()->is('message/add-message') ? 'active-item' : '' }}"><a
                                        href="{{ route('manage-order') }}">Manage Order</a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">
                <!-- content HEADER -->
                @yield('admin_content')
            </div>

            <!--scroll to top-->
            <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
    </div>
    <!--BASIC scripts-->
    <!-- ========================================================= -->
    <script src="{{ asset('backend/vendor/jquery/jquery-1.12.3.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    // <script src="{{ asset('backend/vendor/nano-scroller/nano-scroller.js') }}"></script>
    <script src="{{ asset('https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js') }}"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="{{ asset('backend/javascripts/template-script.min.js') }}"></script>
    <script src="{{ asset('backend/javascripts/template-init.min.js') }}"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <script src="{{ asset('backend/vendor/toastr/toastr.min.js') }}"></script>
    <!--Gallery with Magnific popup-->
    <script src="{{ asset('backend/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <!--Examples-->

    <script>
        function addForm() {
            save_method = "add";
            $('input[name=_method]').val('POST');
            $('#exampleModal').modal('show');
            $('#exampleModal form')[0].reset();
            $('.modal-title').text('Add Post');
            $('#insertbutton').text('Add Post');
        }
    </script>

</body>

</html>
