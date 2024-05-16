<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
    rel="stylesheet">
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    
<link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css2?family=Inconsolata&amp;family=Roboto+Slab&amp;family=Slabo+27px&amp;family=Sofia&amp;family=Ubuntu+Mono&amp;display=swap">

<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">

<!-- END: Theme CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
<!-- END: Custom CSS-->

<style>
    .footer svg {
        animation: heart_anim 1s infinite;
        -webkit-animation: heart_anim 1s infinite;
        -moz-animation: heart_anim 1s infinite;
        -o-animation: heart_anim 1s infinite;
        -ms-animation: heart_anim 1s infinite;
    }

    @keyframes heart_anim {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }
    }

    @-webkit-keyframes heart_anim {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }
    }

    @-moz-keyframes heart_anim {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }
    }

    .app-content.content {
       flex: 1;
    }
    .main-wraper {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
</style>

<!-- BEGIN: Page CSS-->
@yield('styles')
<!-- END: Page CSS-->
