@extends('admin.layouts.main')

@section('title')
    {{ Str::upper(Str::headline(Request::segment(1))) }}
@endsection

@section('styles')
@endsection

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="app-user-view-account">
                    <div class="row">
                        <!-- User Sidebar -->
                        <div class="col-xl-12 col-lg-5 col-md-5 order-1 order-md-0">
                            <!-- User Card -->
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Details</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical">

                                        <div class="row">
                                            @csrf

                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="first-name-vertical">Name</label>
                                                    <input type="text" id="first-name-vertical" class="form-control"
                                                        value="{{ Auth::user()->name}}" name="fname"
                                                        placeholder="Name" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="email-id-vertical">Email</label>
                                                    <input type="email" id="email-id-vertical" class="form-control"
                                                        value="{{ Auth::user()->email }}" name="email-id"
                                                        placeholder="Email" />
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="password-vertical">Old Password</label>
                                                    <input type="password" id="password" class="form-control"
                                                        name="contact" placeholder="Password" />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="password-vertical">New Password</label>
                                                    <input type="password" id="newpassword" class="form-control"
                                                        name="contact" placeholder="New Password" disabled />
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1">
                                                    <label class="form-label" for="password-vertical">Confirm
                                                        Password</label>
                                                    <input type="password" id="confirmpassword" class="form-control"
                                                        name="contact" placeholder="Confirm Password" disabled />
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button type="button" class="btn btn-primary me-1 save" disabled>Save
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
    <script>
        var globalTimeout = null;
        $('#password').keyup(function() {

            if (globalTimeout != null) clearTimeout(globalTimeout);
            globalTimeout = setTimeout(SearchFunc, 1000);

        });


        function SearchFunc() {
            globalTimeout = null;
            var url3 = "{{ url('/') }}" + "/admin/resetpassword1";
            var password = $('#password').val();
            $.ajax({
                url: url3,
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    pass: password
                },
                success: function(result) {
                    console.log(result.status);
                    if (result.status == true) {
                        $('#password').addClass('border border-success');
                        $("#newpassword").prop('disabled', false);
                        $("#confirmpassword").prop('disabled', false);


                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.responseText);
                    alert(url2);
                    $(document).text(xhr.responseText);
                    alert(thrownError);
                }
            });
        };


        $('#confirmpassword').keyup(function() {
            var password = $('#newpassword').val();
            if (password == $(this).val()) {
                $(".save").prop('disabled', false);
            } else {

            }

        });

        $('.save').click(function(e) {
            e.preventDefault();
            var password = $('#newpassword').val();
            var url4 = "{{ url('/') }}" + "/admin/adminUpdate";


            $.ajax({
                url: url4,
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    pass: password
                },
                success: function(result) {

                    msg('success', 'password Changed Successfully');
                    $("#newpassword").prop('disabled', true);
                    $("#confirmpassword").prop('disabled', true);
                    $('#newpassword').val("");
                    $('#confirmpassword').val("");
                    $('#password').val("");
                    $('#password').removeClass('border border-success');
                    // location.reload(true);



                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.responseText);
                    alert(url2);
                    $(document).text(xhr.responseText);
                    alert(thrownError);
                }
            });
        });
    </script>
@endsection
