<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Helsinki</title>
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('backend/favicon/apple-icon-120x120.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('backend/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('backend/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/favicon/favicon-16x16.png') }}">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/animate.css/animate.css') }}">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('backend/stylesheets/css/style.css') }}">
</head>

<body>
    <div class="wrap">
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body animated slideInDown">
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--LOGO-->
            <div class="logo">
                {{-- <img alt="logo" src="images/logo-dark.png" />
                --}}
            </div>

            <div class="box">
                @include('includes.message')
                <!--SIGN IN FORM-->
                <div class="panel mb-none">
                    <div class="panel-content bg-scale-0">

                        <form action="{{ route('save-admin') }}" method="POST">
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" name="admin_name" id="name"
                                        placeholder="Name">
                                    <i class="fa fa-user"></i>
                                </span>
                            </div>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="email" class="form-control" name="admin_email" id="email"
                                        placeholder="Email">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <span class="input-with-icon">
                                    <input type="password" class="form-control" name="admin_password" id="password"
                                        placeholder="Password">
                                    <i class="fa fa-key"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <span class="input-with-icon">
                                    <input type="password" class="form-control" name="confirm_password"
                                        id="confirm-password" placeholder="Confirm Password">
                                    <i class="fa fa-key"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <a type="submit" class="btn btn-primary btn-block">Register</a>
                            </div>
                            <div class="form-group text-center">
                                Have an account?, <a href="{{ route('login-view') }}">Log In</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        </div>
    </div>
    <!--BASIC scripts-->
    <!-- ========================================================= -->
    <script src="{{ asset('backend/vendor/jquery/jquery-1.12.3.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/nano-scroller/nano-scroller.js') }}"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="{{ asset('backend/javascripts/template-script.min.js') }}"></script>
    <script src="{{ asset('backend/javascripts/template-init.min.js') }}"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
</body>

</html>
