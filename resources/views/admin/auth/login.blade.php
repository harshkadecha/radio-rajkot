<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Radio Rajkot - Admin @yield('title')</title>

    <link rel="apple-touch-icon" href="{{ asset('images/ico/apple-touch-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ico/favicon.ico') }}">
    <link rel=”icon” type=“image/x-icon” href="{{ asset('images/ico/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('images/ico/site.webmanifest') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/authentication.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        <a class="brand-logo" href="{{ route('dashboard') }}">
                            <img src="{{ asset('images/logo/hd_logo_-06-06-removebg.png') }}" alt=""
                                class="img-fluid">
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img
                                    class="img-fluid" src="{{ asset('images/pages/login-v2.svg') }}" alt="Login V2" />
                            </div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">Welcome to <br><strong>Radio Rajkot</strong></h2>
                                <p class="card-text mb-2">Please sign-in to your account</p>
                                @if (Session::has('error'))
                                    <div class="alert alert-danger" style="padding: 10px;">
                                        {{ Session::get('error') }}
                                        @php
                                            Session::forget('error');
                                        @endphp
                                    </div>
                                @endif
                                <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-1">
                                        <label class="form-label" for="email">{{ __('Email Address') }}</label>
                                        <input class="form-control @error('email') is-invalid @enderror"
                                            id="email" type="text" name="email"
                                            placeholder="john@example.com" aria-describedby="login-email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus=""
                                            tabindex="1" />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label"
                                                for="login-password">{{ __('Password') }}</label><a
                                                href="{{ route('password.request') }}"><small>Forgot
                                                    Password?</small></a>
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input
                                                class="form-control form-control-merge @error('password') is-invalid @enderror"
                                                id="password" type="password" name="password"
                                                placeholder="············" aria-describedby="login-password" required
                                                autocomplete="current-password" tabindex="2" /><span
                                                class="input-group-text cursor-pointer"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-eye-off font-small-4">
                                                    <path
                                                        d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24">
                                                    </path>
                                                    <line x1="1" y1="1" x2="23"
                                                        y2="23"></line>
                                                </svg></span>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" id="remember" type="checkbox"
                                                name="remember" tabindex="3"
                                                {{ old('remember') ? 'checked' : '' }} />
                                            <label class="form-check-label"
                                                for="remember-me">{{ __('Remember Me') }}</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100" type="submit"
                                        tabindex="4">{{ __('Login') }}</button>
                                    {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
                                </form>

                                {{-- <p class="text-center mt-2"><span>New on our platform?</span>
                                    <a href="{{ route('admin-register') }}"><span>&nbsp;Create an account</span></a>
                                </p> --}}
                                {{-- <div class="divider my-2">
                                    <div class="divider-text">or</div>
                                </div>
                                <div class="auth-footer-btn d-flex justify-content-center">
                                    <a class="btn btn-facebook waves-effect waves-float waves-light"
                                        href="https://www.facebook.com/Yuvashaktifdn" target="_blank"><i
                                            data-feather='facebook'></i></a>
                                    <a class="btn btn-twitter white waves-effect waves-float waves-light"
                                        href="https://twitter.com/Yuvashaktifdn" target="_blank"><i
                                            data-feather='twitter'></i></a>
                                    <a class="btn btn-instagram waves-effect waves-float waves-light"
                                        href="https://www.instagram.com/yuvashaktifdn/" target="_blank"><i
                                            data-feather='instagram'></i></a>
                                </div> --}}
                            </div>
                            <!-- /Login-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- BEGIN: Vendor JS-->
        <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
        <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="{{ asset('app-assets/js/scripts/pages/auth-login.js') }}"></script>
        <!-- END: Page JS-->

        <script>
            $(window).on('load', function() {
                if (feather) {
                    feather.replace({
                        width: 14,
                        height: 14
                    });
                }
            })
        </script>
        <!-- BEGIN: Vendor JS-->

</body>
<!-- END: Body-->

</html>
