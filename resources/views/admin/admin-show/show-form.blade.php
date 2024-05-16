@extends('admin.layouts.main')

@section('title')
    {{ Str::upper(Str::headline(Request::segment(2))) }}
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">

    <style>
        .form-select-sm,
        .form-control-sm {
            font-size: 1rem;
            padding: 0.571rem 1rem 0.571rem 1rem;
        }
        textarea.form-control {
            /* line-height: 0.6rem; */
            padding: 0.8rem 1rem !important;
        }
    </style>
@endsection

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-body">
                <!-- Validation -->
                <section class="bs-validation">
                    <div class="row">
                        <!-- jQuery Validation -->
                        <div class="col-md-6 col-12">
                            <div class="content-header row">
                                <div class="content-header-left col-md-12 mb-2">
                                    <div class="row breadcrumbs-top">
                                        <div class="col-8">
                                            <h2 class="content-header-title float-start mb-0">Schedule</h2>
                                            <div class="breadcrumb-wrapper">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item active"><a
                                                            href="{{ route('show.index') }}">Go Back</a>
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-12">
                                <div class="card-header">
                                    <h4 class="card-title">Schedule Information</h4>
                                </div>
                                <div class="card-body">

                                    @csrf
                                    @php
                                        if (isset($schedule->id)) {
                                            $url = 'admin/show/' . $schedule->id;
                                            $method = 'PUT';
                                        } else {
                                            $url = 'admin/show';
                                            $method = 'POST';
                                        }
                                    @endphp
                                    {!! Form::open(['method' => $method, 'url' => $url, 'files' => true, 'id' => 'commentForm']) !!}
                                    {{-- this hidden input tag is for put patch and delete method --}}
                                    {{-- <input type="hidden" name="_method" value="PUT"> --}}
                                    {!! Form::token() !!}

                                    <div class="d-flex mb-1 align-items-center">
                                        <a href="#" class="me-25">
                                            <img id="Upload-img" class="img-thumbnail" alt="profile image" height="100"
                                                width="100" src={!! isset($schedule->show_banner)
                                                    ? ($schedule->show_banner == ''
                                                        ? URL::to('/') . '/images/avatars/default.png'
                                                        : URL::to('/') . '/storage/image/show/' . $schedule->show_banner)
                                                    : URL::to('/') . '/images/avatars/default.png' !!} />
                                        </a>
                                        <!-- upload and reset button -->
                                        <div class="d-flex align-items-end mt-75 ms-1">
                                            <div>
                                                {!! Form::label('Upload', null, ['class' => 'btn btn-sm btn-primary mb-75 me-75']) !!}
                                                {!! Form::file('image', ['id' => 'Upload', 'hidden', 'accept' => 'image/*', 'onchange' => 'previewFile(this)']) !!}
                                                {{-- {!! Form::label('Reset', null, ['id' => 'account-reset', 'class' => 'btn btn-sm btn-outline-secondary mb-75']) !!} --}}
                                            </div>
                                        </div>
                                        <!--/ upload and reset button -->
                                    </div>


                                    <div class="mb-1">

                                        {!! Form::label('Show Name', null, ['class' => 'form-label ']) !!}
                                        {!! Form::text('show_name', old('show_name', isset($schedule->show_name) ? $schedule->show_name : ''), [
                                            'placeholder' => 'Show Name',
                                            'id' => 'show_name',
                                            'class' => 'form-control' . ($errors->has('show_name') ? 'is-invalid' : ''),
                                            'required',
                                        ]) !!}
                                        @error('show_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        {!! Form::label('RJ Name', null, ['class' => 'form-label']) !!}
                                        {!! Form::text('rj_name', old('rj_name', isset($schedule->rj_name) ? $schedule->rj_name : ''), [
                                            'placeholder' => 'Rj Name',
                                            'id' => 'rj_name',
                                            'class' => 'form-control ' . ($errors->has('rj_name') ? 'is-invalid' : ''),
                                        ]) !!}
                                        @error('rj_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        {!! Form::label('RJ Insta Link', null, ['class' => 'form-label']) !!}
                                        {!! Form::text('rj_follow', old('rj_follow', isset($schedule->rj_follow) ? $schedule->rj_follow : ''), [
                                            'placeholder' => 'Rj Insta link',
                                            'id' => 'rj_follow',
                                            'class' => 'form-control ' . ($errors->has('rj_follow') ? 'is-invalid' : ''),
                                        ]) !!}
                                        @error('rj_follow')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        {!! Form::label('Start Time', null, ['class' => 'form-label']) !!}
                                        {!! Form::text('start_time', old('start_time', isset($schedule->start_time) ? $schedule->start_time : ''), [
                                            'placeholder' => 'HH:MM',
                                            'id' => 'start_time',
                                            'class' => 'form-control flatpickr-input show-time ',
                                        ]) !!}
                                        @error('start_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="mb-1">
                                        {!! Form::label('End Time', null, ['class' => 'form-label']) !!}
                                        {!! Form::text('end_time', old('end_time', isset($schedule->end_time) ? $schedule->end_time : ''), [
                                            'placeholder' => 'HH:MM',
                                            'id' => 'end_time',
                                            'class' => 'form-control flatpickr-input show-time ',
                                        ]) !!}
                                        @error('end_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <div class="mb-1">
                                        {!! Form::label('Show Description', null, ['class' => 'form-label']) !!}
                                        {!! Form::textarea('show_description',old('show_description', isset($schedule->show_description) ? $schedule->show_description : ''),
                                            [
                                                'placeholder' => 'Show Description',
                                                'id' => 'show_description',
                                                'class' => 'form-control ',
                                            ],
                                        ) !!}
                                        @error('show_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        {!! Form::button(isset($schedule) ? 'Update' : 'Create', ['class' => 'btn btn-primary submit']) !!}
                                    </div>
                                </div>

                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                    <!-- /jQuery Validation -->
            </div>
            </section>
            <!-- /Validation -->

        </div>
    </div>
    </div>

    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
@endsection

@section('scripts')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/forms/form-validation.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/modal-add-new-cc.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/page-pricing.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/modal-add-new-address.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/modal-create-app.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/modal-two-factor-auth.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/modal-edit-user.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/modal-share-project.js') }}"></script>

    <script src="{{ asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/cleave/cleave.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css" />
    <script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        crossorigin="anonymous" />



    <!-- END: Page JS-->
    <script>
        //image preview
        // $("img").hide();

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

        $(document).ready(function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
            $('.submit').click(function() {
                if ($("#commentForm").valid() == true) {
                    $('#commentForm').submit();
                }
            });
            // this is for validation and message
            $("#commentForm").validate({
                errorClass: 'is-invalid',
                rules: {
                    show_name: {
                        required: true,
                    },
                    rj_name: {
                        required: true,
                    },
                    start_time: {
                        required: true,
                    },
                    end_time: {
                        required: true,
                    },
                },
                messages: {
                    show_name: {
                        required: "Show name is Required",
                    },
                    rj_name: {
                        required: "Rj Name is Required"
                    },
                    start_time: {
                        required: "Start Time is Required"
                    },
                    end_time: {
                        required: "End Time is Required"
                    },
                },
            });
        });
        const fp = flatpickr(".show-time", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        }); // flatpickr
    </script>
@endsection
