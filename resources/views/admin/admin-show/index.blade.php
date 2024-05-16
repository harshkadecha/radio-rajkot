@extends('admin.layouts.main')

@section('title')
    {{ Str::upper(Str::headline(Request::segment(2))) }}
@endsection

@section('styles')
    <!-- BEGIN: Page CSS-->

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/charts/chart-apex.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-invoice-list.css') }}">

    <!-- END: Page CSS-->
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Basic Layout</h5> <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                        <form class="show_schedule_form" enctype="multipart/form-data" method="post" action="{{ route('show.store') }}">
                            @csrf
                            <div class="row show-1">
                                <div class="my-2 align-items-center">
                                    <small class="text-muted">Show 1</small>
                                    <span class="float-end">
                                        <button class="delete-show btn btn-close" type="button"></button>
                                    </span>
                                </div>
                                <div class="input-group col-sm-12 col-md-4 mb-2 ">
                                    <input type="file" name="show_banner[]" class="form-control" id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-outline-primary waves-effect" type="button"
                                        id="inputGroupFileAddon04">Button</button>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label" for="basic-default-fullname">Show name</label>
                                    <input type="text" name="show_name[]" class="form-control" id="basic-default-fullname"
                                        placeholder="John Doe" required>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label" for="basic-default-company">Rj Name</label>
                                    <input type="text" name="rj_name[]" class="form-control" id="basic-default-company"
                                        placeholder="ACME Inc." required>
                                </div>
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <label for="flatpickr-time" class="form-label">Show Start</label>
                                    <input type="text" class="form-control flatpickr-input show-time" placeholder="HH:MM"
                                        name="show_start_time[]" id="flatpickr-time" readonly="readonly" value="13:40" required>
                                </div>
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <label for="flatpickr-time" class="form-label">Show end</label>
                                    <input type="text" class="form-control flatpickr-input show-time" placeholder="HH:MM"
                                        name="show_end_time[]" id="flatpickr-time" readonly="readonly" value="12:40" required>
                                </div>


                                <div class="col-sm-12 col-md-6 mb-2">
                                    <label class="form-label" for="basic-default-message">Desciption</label>
                                    <textarea id="basic-default-message" name="show_description[]" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?" required></textarea>
                                </div>
                            </div>
                            <hr>
                            {{-- <div class="row show-1">
                                <div class="my-2 align-items-center"><small class="text-muted">Show 1</small></div>
                                <div class="input-group col-sm-12 col-md-4 mb-2 ">
                                    <input type="file" class="form-control" id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-outline-primary waves-effect" type="button"
                                        id="inputGroupFileAddon04">Button</button>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label" for="basic-default-fullname">Show name</label>
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        placeholder="John Doe">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label" for="basic-default-company">Rj Name</label>
                                    <input type="text" class="form-control" id="basic-default-company"
                                        placeholder="ACME Inc.">
                                </div>
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <label for="flatpickr-time" class="form-label">Show Start</label>
                                    <input type="text" class="form-control flatpickr-input show-time" placeholder="HH:MM"
                                        id="flatpickr-time" readonly="readonly" value="13:40">
                                </div>
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <label for="flatpickr-time" class="form-label">Show end</label>
                                    <input type="text" class="form-control flatpickr-input show-time" placeholder="HH:MM"
                                        id="flatpickr-time" readonly="readonly" value="12:40">
                                </div>


                                <div class="col-sm-12 col-md-6 mb-2">
                                    <label class="form-label" for="basic-default-message">Desciption</label>
                                    <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?"></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row show-1">
                                <div class="my-2 align-items-center"><small class="text-muted">Show 1</small></div>
                                <div class="input-group col-sm-12 col-md-4 mb-2 ">
                                    <input type="file" class="form-control" id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-outline-primary waves-effect" type="button"
                                        id="inputGroupFileAddon04">Button</button>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label" for="basic-default-fullname">Show name</label>
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        placeholder="John Doe">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label" for="basic-default-company">Rj Name</label>
                                    <input type="text" class="form-control" id="basic-default-company"
                                        placeholder="ACME Inc.">
                                </div>
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <label for="flatpickr-time" class="form-label">Show Start</label>
                                    <input type="text" class="form-control flatpickr-input show-time" placeholder="HH:MM"
                                        id="flatpickr-time" readonly="readonly" value="13:40">
                                </div>
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <label for="flatpickr-time" class="form-label">Show end</label>
                                    <input type="text" class="form-control flatpickr-input show-time" placeholder="HH:MM"
                                        id="flatpickr-time" readonly="readonly" value="12:40">
                                </div>


                                <div class="col-sm-12 col-md-6 mb-2">
                                    <label class="form-label" for="basic-default-message">Desciption</label>
                                    <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?"></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row show-1">
                                <div class="my-2 align-items-center"><small class="text-muted">Show 1</small></div>
                                <div class="input-group col-sm-12 col-md-4 mb-2 ">
                                    <input type="file" class="form-control" id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-outline-primary waves-effect" type="button"
                                        id="inputGroupFileAddon04">Button</button>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label" for="basic-default-fullname">Show name</label>
                                    <input type="text" class="form-control" id="basic-default-fullname"
                                        placeholder="John Doe">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label" for="basic-default-company">Rj Name</label>
                                    <input type="text" class="form-control" id="basic-default-company"
                                        placeholder="ACME Inc.">
                                </div>
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <label for="flatpickr-time" class="form-label">Show Start</label>
                                    <input type="text" class="form-control flatpickr-input show-time" placeholder="HH:MM"
                                        id="flatpickr-time" readonly="readonly" value="13:40">
                                </div>
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <label for="flatpickr-time" class="form-label">Show end</label>
                                    <input type="text" class="form-control flatpickr-input show-time" placeholder="HH:MM"
                                        id="flatpickr-time" readonly="readonly" value="12:40">
                                </div>


                                <div class="col-sm-12 col-md-6 mb-2">
                                    <label class="form-label" for="basic-default-message">Desciption</label>
                                    <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?"></textarea>
                                </div>
                            </div> --}}
                            <button type="button" class="btn btn-warning waves-effect waves-light" id="add_show">Add Show</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light" id="store_data">Send</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('scripts')
    <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/charts/chart-chartjs.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-invoice-list.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>

    <script>
        const fp = flatpickr(".show-time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        }); // flatpickr

        $('#add_show').click(function(e){
            e.preventDefault();
            $('#add_show').before(`<div class="row show-1">
                                <div class="my-2 align-items-center">
                                    <small class="text-muted">Show 1</small>
                                    <span class="float-end">
                                        <button class="delete-show btn btn-close" type="button"></button>
                                    </span>
                                </div>
                                <div class="input-group col-sm-12 col-md-4 mb-2 ">
                                    <input type="file" name="show_banner[]" class="form-control" id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    <button class="btn btn-outline-primary waves-effect" type="button"
                                        id="inputGroupFileAddon04">Button</button>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label" for="basic-default-fullname">Show name</label>
                                    <input type="text" name="show_name[]" class="form-control" id="basic-default-fullname"
                                        placeholder="John Doe" required>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label class="form-label" for="basic-default-company">Rj Name</label>
                                    <input type="text" name="rj_name[]" class="form-control" id="basic-default-company"
                                        placeholder="ACME Inc." required>
                                </div>
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <label for="flatpickr-time" class="form-label">Show Start</label>
                                    <input type="text" class="form-control flatpickr-input show-time" placeholder="HH:MM"
                                        name="show_start_time[]" id="flatpickr-time" readonly="readonly" value="13:40" required>
                                </div>
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <label for="flatpickr-time" class="form-label">Show end</label>
                                    <input type="text" class="form-control flatpickr-input show-time" placeholder="HH:MM"
                                        name="show_end_time[]" id="flatpickr-time" readonly="readonly" value="12:40" required>
                                </div>


                                <div class="col-sm-12 col-md-6 mb-2">
                                    <label class="form-label" for="basic-default-message">Desciption</label>
                                    <textarea id="basic-default-message" name="show_description[]" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?" required></textarea>
                                </div>
                            </div>
                            <hr>
                            `);

            const fp = flatpickr(".show-time", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
            }); // flatpickr
        });

        // $('#store_data').on('click',function(e){
        //     e.preventDefault();

        //     $(":input").serializeArray()
        //     console.log(datastring);





        // });


    </script>
@endsection
