<!-- BEGIN: Vendor JS-->

<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->

<script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>

<script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/extensions/moment.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/forms/form-select2.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>


<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('app-assets/js/core/app.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Custom JS-->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<!-- END: Custom JS-->

<script>
    @if (Session::has('response'))
        @if (Session::get('response')['status'])
            toastr.success(
                '{{ Session::get('response')['message'] }}'
            );
        @else
            toastr.error(
                '{{ Session::get('response')['message'] }}'
            );
            console.log(' {{ Session::get('response')['message'] }} ');


        @endif
    @endif

    function msg(mode,msg){
        var isRtl = $('html').attr('data-textdirection') === 'rtl',
                typeSuccess = $('#type-success'),
                typeInfo = $('#type-info'),
                typeWarning = $('#type-warning'),
                typeError = $('#type-error'),
                positionTopLeft = $('#position-top-left'),
                positionTopCenter = $('#position-top-center'),
                positionTopRight = $('#position-top-right'),
                positionTopFull = $('#position-top-full'),
                positionBottomLeft = $('#position-bottom-left'),
                positionBottomCenter = $('#position-bottom-center'),
                positionBottomRight = $('#position-bottom-right'),
                positionBottomFull = $('#position-bottom-full'),
                progressBar = $('#progress-bar'),
                clearToastBtn = $('#clear-toast-btn'),
                fastDuration = $('#fast-duration'),
                slowDuration = $('#slow-duration'),
                toastrTimeout = $('#timeout'),
                toastrSticky = $('#sticky'),
                slideToast = $('#slide-toast'),
                fadeToast = $('#fade-toast'),
                clearToastObj;

            setTimeout(function() {
                toastr[mode](
                      msg , {
                        closeButton: true,
                        tapToDismiss: false,
                        rtl: isRtl
                    }
                );
            }, 2000);
    }
</script>

@yield('scripts')
