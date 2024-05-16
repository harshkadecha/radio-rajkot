@extends('admin.layouts.main')

@section('title')
    {{ Str::upper(Str::headline(Request::segment(2))) }}
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/katex.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/quill.bubble.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/file-uploaders/dropzone.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-file-uploader.css') }}">
<link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    crossorigin="anonymous" />
<link data-require="dropzone@4.0.1" data-semver="4.0.1" rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/basic.css" />
<link data-require="dropzone@4.0.1" data-semver="4.0.1" rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-quill-editor.css') }}">
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.17.8/tagify.css"
    integrity="sha512-Ft73YZFLhxI8baaoTdSPN8jKRPhYu441A8pqlqf/CvGkUOaLCLm59ZWMdls8lMBPjs1OZ31Vt3cmZsdBa3EnMw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                        <div class="col-md-12 col-12">
                            <div class="content-header row">
                                <div class="content-header-left col-md-12 mb-2">
                                    <div class="row breadcrumbs-top">
                                        <div class="col-8">
                                            <h2 class="content-header-title float-start mb-0">Blog</h2>
                                            <div class="breadcrumb-wrapper">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item active"><a
                                                            href="{{ route('admin-blogs') }}">Go Back</a>
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-12">
                                <div class="card-header">
                                    @if (isset($blog->title))
                                        <h4 class="card-title">{{ $blog->title }}</h4>
                                    @else
                                        <h4 class="card-title">Blog Information</h4>
                                    @endif
                                </div>
                                <div class="card-body">

                                    @csrf
                                    @php
                                        if (isset($blog->id)) {
                                            $url = 'admin/admin-blog/' . $blog->id;
                                            $method = 'PUT';
                                        } else {
                                            $url = 'admin/admin-blog/';
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
                                                width="100" style="height: 235px;width: 377px;border-radius: 18px;"
                                                src={!! isset($blog->images)
                                                    ? ($blog->images == ''
                                                        ? URL::to('/') . '/images/avatars/default.png'
                                                        : URL::to('/') . '/storage/blog/' . $blog->images)
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
                                        @error('image')
                                            {{ $message }}
                                        @enderror

                                    </div>

                                    <div class="mb-1">
                                        {!! Form::label('Title', null, ['class' => 'form-label ']) !!}
                                        {!! Form::text('title', old('title', isset($blog->title) ? $blog->title : ''), [
                                            'placeholder' => 'Blog Title',
                                            'id' => 'title',
                                            'class' => 'form-control ' . ($errors->has('title') ? 'is-invalid' : ''),
                                            'required',
                                        ]) !!}
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <section class="full-editor">
                                            <h4 class="card-title">Description</h4>
                                            <p>Add Blog Text Here you can use Editor for Font style.....</p>
                                            <div id="full-wrapper">
                                                <div id="full-container">
                                                    <div class="editor" id="editor">
                                                    </div>
                                                    <input type="hidden" name="description" id="description">
                                                </div>
                                            </div>
                                        </section>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <!-- full Editor end -->
                                    </div>
                                    <div class="mb-1">
                                        {!! Form::label('Category', null, ['class' => 'form-label', 'for' => 'select2-basic']) !!}
                                        {!! Form::select('category', $category, isset($blog->category) ? $blog->category : '', [
                                            'class' => 'select2 form-select ' . ($errors->has('id') ? 'is-invalid' : ''),
                                            'id' => 'select2-basic',
                                            'placeholder' => 'Select Category',
                                            'required',
                                        ]) !!}

                                        @error('category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="mb-1">
                                        {!! Form::button(isset($city) ? 'Update' : 'Create', ['class' => 'btn btn-primary submit']) !!}
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
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Page JS-->
{{-- <script src="{{ asset('app-assets/js/scripts/forms/form-validation.js') }}"></script> --}}
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

<script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>

<script src="{{ asset('app-assets/vendors/js/file-uploaders/dropzone.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/forms/form-file-uploader.js') }}"></script>
<script data-require="dropzone@4.0.1" data-semver="4.0.1"
    src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>
<script src="{{ asset('app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/forms/form-quill-editor.js') }}"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.17.8/tagify.min.js"
    integrity="sha512-7vyDVrzHbIl2MbbDj2lgeXUVSe4NSbY5jn030+QN321CTl8XEc3J5Qlq976YY5gs+Ifwff9Q2SrDXLPWxAp2oQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--  jquery script  -->
{{-- <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script> --}}
<!--  validation script  -->
{{-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script> --}}
<script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<!--  jsrender script  -->
<script src="http://cdn.syncfusion.com/js/assets/external/jsrender.min.js"></script>
<!-- Essential JS UI widget -->
<script src="http://cdn.syncfusion.com/16.4.0.52/js/web/ej.web.all.min.js"></script>
    <!-- END: Page JS-->

    <script>
        //image preview
        // $("img").hide();
        @if (isset($blog->description))

            var txt = `{!! $blog->description !!}`;
            $('.ql-editor').html(txt);
            $('#description').html(txt);
        @endif
        $('.ql-editor').attr("style", "min-height:200px");



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
            $('.submit').click(function() {
                if ($("#commentForm").valid() == true) {
                    var text = $('.ql-editor').html();
                    $('#description').val(text);
                    var text = $('#title').val();
                    text = text.replace(' ', '-');
                    text = text.toLowerCase();
                    $('#slug').val(text);
                    // alert(text);
                    $('#commentForm').submit();
                    // $('#commentForm').submit();
                }
            });
            // this is for validation and message
            $("#commentForm").validate({
                errorClass: 'is-invalid',
                rules: {
                    title: "required",
                    category: "required",
                },
                messages: {
                    title: {
                        required: "Blog Title is Required",
                    },
                    category: {
                        required: "Please Select Category"
                    },
                },
            });
        });
    </script>
@endsection
