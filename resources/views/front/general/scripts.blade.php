<!-- JavaScript -->
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script> --}}
{{-- <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}"></script> --}}
<script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>

<script src="{{ asset('front-assets/js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('front-assets/js/vendors.js') }}"></script>
{{-- <script src="{{ asset('front-assets/js/main.js') }}"></script> --}}
<!-- Toastr script -->
<script src="{{ asset('front-assets/js/toastr.min.js') }}"></script>
<!-- Date Range Picker -->
<script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
{{-- <script disable-devtool-auto src='https://cdn.jsdelivr.net/npm/disable-devtool'></script>
<!--Use the specified version-->
<script disable-devtool-auto src='https://cdn.jsdelivr.net/npm/disable-devtool@x.x.x'></script>
<!--Use latest version-->
<script disable-devtool-auto src='https://cdn.jsdelivr.net/npm/disable-devtool@latest'></script> --}}
<!-- Vue JS Component -->
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
</script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace();
</script>
<!-- BEGIN: Page CSS-->
@yield('scripts')
<!-- END: Page CSS-->
