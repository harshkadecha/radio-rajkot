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
                                            <h2 class="content-header-title float-start mb-0">Ad Manage</h2>
                                            <div class="breadcrumb-wrapper">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item active"><a
                                                            href="{{ route('ad-manage.index') }}">Go Back</a>
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-12">
                                <div class="card-header">
                                    <h4 class="card-title">Ad Information</h4>
                                </div>
                                <div class="card-body">

                                    @csrf
                                    @php
                                        if (isset($advertise->id)) {
                                            $url = 'admin/ad-manage/' . $advertise->id;
                                            $method = 'PUT';
                                        } else {
                                            $url = 'admin/ad-manage';
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
                                                width="100" src={!! isset($advertise->image)
                                                    ? ($advertise->image == ''
                                                        ? URL::to('/') . '/images/avatars/default.png'
                                                        : URL::to('/') . '/storage/image/advertise/' . $advertise->image)
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

                                        {!! Form::label('Location', null, ['class' => 'form-label']) !!}
                                        {!! Form::select('type', $type, isset($advertise->type) ? $advertise->type : '', [
                                            'class' => 'form-control form-select' . ($errors->has('type') ? 'is-invalid' : ''),
                                            'placeholder' => 'Select Location',
                                            'required',
                                        ]) !!}
                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-1">
                                        {!! Form::label('Status', null, ['class' => 'd-block form-label']) !!}
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="form-check mb-50">
                                            {!! Form::radio('active_status', 1, '', ['class' => 'form-check-input', 'id' => 'enable', 'checked' => isset($advertise->active_status) ? ($advertise->active_status == '1' ? true : false) : true]) !!}

                                            {!! Form::label('enable', 'Enable', ['class' => 'form-check-label']) !!}
                                        </div>
                                        <div class="form-check ">
                                            {!! Form::radio('active_status', 0, '', ['class' => 'form-check-input', 'id' => 'desable', 'checked' => isset($advertise->active_status) ? ($advertise->active_status == '0' ? true : false) : false]) !!}
                                            {!! Form::label('disable', 'Disable', ['class' => 'form-check-label']) !!}
                                        </div>
                                    </div>

                                    <div class="mb-1">
                                        {!! Form::button(isset($advertise) ? 'Update' : 'Create', ['class' => 'btn btn-primary submit']) !!}
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
                    name: {
                        required: true,
                    },
                    code: "required",
                    rate: "required",
                    symbol: "required",
                },
                messages: {
                    first_Name: {
                        required: "Please enter Currency name",
                    },
                    code: {
                        required: "Please Provide Currency Code"
                    },
                    rate: {
                        required: "Please Provide Rate"
                    },
                    symbol: {
                        required: "Please Provide Symbol"
                    },
                },
            });
        });
    </script>
@endsection
