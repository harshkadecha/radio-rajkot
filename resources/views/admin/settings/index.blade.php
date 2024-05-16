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
                    <div class="row breadcrumbs-top"></div>
                </div>
            </div>
            <div class="content-body">
                <section class="app-user-view-account">
                    <div class="row">
                        <!-- User Sidebar -->
                        <div class="col-xl-12 col-lg-5 col-md-5 order-1 order-md-0">
                            <!-- User Card -->
                            <div class="card">
                                <div class="card-header">
                                    <h4>Settings</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" action="{{ route('settings.store') }}" method="post"
                                        enctype="multipart/form-data">

                                        <div class="row">
                                            @csrf

                                            <div class="mb-1">
                                                {!! Form::label('Home page Text', null, ['class' => 'form-label']) !!}
                                                {!! Form::text('home_page_text', old('home_page_text', isset($settings->home_page_text) ? $settings->home_page_text : ''), [
                                                    'placeholder' => 'Home page Text',
                                                    'id' => 'home_page_text',
                                                    'class' => 'form-control',
                                                ]) !!}
                                            </div>


                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary me-1 save">Save
                                                    Changes</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- /User Card -->
                        </div>
                        <!--/ User Sidebar -->

                    </div>
                </section>

            </div>
        </div>
    </div>

    <!-- END: Content-->
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $("#Upload-img").attr("src", reader.result);
                    $("img").show();
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
