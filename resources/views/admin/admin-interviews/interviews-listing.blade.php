@extends('admin.layouts.main')

@section('title')
    {{ Str::upper(Str::headline(Request::segment(2))) }}
@endsection

@section('styles')
    <!-- BEGIN: Page CSS-->
    <style>
        div.dataTables_paginate span {
            display: none;
        }

        @media screen and (max-width: 767px) {
            li.paginate_button.previous {
                display: inline;
            }

            li.paginate_button.next {
                display: inline;
            }

            li.paginate_button {
                display: none;
            }
        }

        .form-select-sm,
        .form-control-sm {
            font-size: 1rem;
            padding: 0.571rem 1rem 0.571rem 1rem;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-pickadate.css') }}">

    <!-- END: Page CSS-->
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">

        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-12 mb-2">
                    <div class="row breadcrumbs-top">

                        <div class="col-4 text-end">
                            {{-- <a class="dt-button btn btn-primary btn-add-record ms-2 " tabindex="0"
                                aria-controls="DataTables_Table_0" type="button" href='{{ route('donors.create') }}'></a> --}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">

                {{-- {{ Auth::user()->id }} --}}

                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header row">
                                    <div class="col-sm-12 col-md-2">
                                        <h2>Interview</h2>
                                    </div>
                                    <div class="col-sm-12 col-md-2 flex-end">
                                        <a href="{{ route('interviews.create') }}" class="btn btn-primary">Add Interview</a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <table class="datatables-basic table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Video Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Basic table -->
            </div>
        </div>
    </div>

    <div class="vertical-modal-ex">
        <!-- Modal -->

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Are You Sure!!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Are You Sure You wants to Delete Show
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary accept" id="del"
                            data-bs-dismiss="modal">Accept</button>
                        <button type="button" class="btn btn-danger reject" id="reg"
                            data-bs-dismiss="modal">Reject</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
    <script>
        $(document).ready(function() {
            var datatable = $('.datatables-basic').DataTable({
                processing: true,
                responsive: true,
                dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
                'serverSide': true,
                'serverMethod': 'get',
                ajax: {
                    url: "{{ route('get_interviews_data') }}",
                    contentType : 'application/json',
                    dataType : 'json',
                    headers: {"Accepts": "text/plain; charset=utf-8"}
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: null,
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {

                            return `<div class="d-flex align-items-center col-actions">
                                <a href="interviews/${data.id}/edit" class="me-1" data-bs-toggle="tooltip" data-bs-placement="top" id="del_row">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-small-4 me-50"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                </a>
                                <a class="me-1 destroy" id='${data.id}' ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash font-small-4 me-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>`;

                            ;
                        }
                    },

                ],
            });

            $(document).on("click", ".destroy", function() {
                $("#exampleModalCenter").modal('show');
                var id = $(this).attr('id');
                $('.accept').attr('id', id);
            });

            $(document).on("click", ".accept", function() {

                var id = $(this).attr('id');
                var token = $("meta[name='csrf-token']").attr("content");

                var url = "{{ url('/') }}" + "/admin/interviews/" + id;
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function(response) {

                        if (response.status) {
                            datatable.ajax.reload(null, false);
                            toastr.success(
                                response.message
                            );
                        } else {
                            toastr.error(
                                response.message
                            );
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status);
                        alert(xhr.responseText);
                        alert(url);
                        $(document).text(xhr.responseText);
                        alert(thrownError);
                    }
                });
            });






        });

        function toTitleCase(str) {
            return str.replace(/(?:^|\s)\w/g, function(match) {
                return match.toUpperCase();
            });
        }
    </script>
@endsection
