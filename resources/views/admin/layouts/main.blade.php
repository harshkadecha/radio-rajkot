<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    {{-- {{ asset('images/donor/dp.png') }} --}}
    {{-- <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico')}}"> --}}
    <link rel="apple-touch-icon" href="{{ asset('images/ico/apple-touch-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ico/favicon.ico') }}">
    <link rel=”icon” type=“image/x-icon” href="{{ asset('images/ico/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('images/ico/site.webmanifest') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
`
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Radio Rajkot Admin - @yield('title')</title>

    @include('admin.general.styles')
    <style lang="styles">
        #loading {
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            text-align: center;
            opacity: 0.7;
            background-color: #fff;
            z-index: 9999;
        }


    </style>
</head>


<body class="vertical-layout vertical-menu-modern menu-expanded  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    @include('admin.general.sidebar')

    <div class="main-wraper">

        @include('admin.general.header')

        <!-- BEGIN: Body-->

        <!-- BEGIN: Content-->
        @yield('content')
        <!-- END: Content-->

        {{-- loader start --}}

        <div id="loading">
            <img id="loading-image" src="{{asset('app-assets/images/icons/Ajax-loader.gif')}}" alt="Loading..." />
        </div>
        {{-- loader end --}}

        <!-- BEGIN: Footer-->
        @include('admin.general.footer')
        <!-- END: Footer-->

    </div>

    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    @include('admin.general.scripts')
</body>

<!-- END: Body-->
<script>
    $('#loading').hide();

</script>


</html>
