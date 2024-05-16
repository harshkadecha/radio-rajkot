@extends('front.layouts.main')

@section('title')
    89.6 FM
@endsection
@section('description')
    89.6 FM Radio Rajkot Radio FM
@endsection

@section('meta')
    <meta name="keywords" content="fm, 89.6, 89.6 FM, radio rajkot, Radio Rajkot" />
@endsection
@section('styles')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/custome.css?v=').time() }}">
@endsection
@section('content')
    <div class="row">
        <div class="career-section container text-center fs-4" style="color: #000 !important">
            {{-- <h5>Vacancy</h5>
            <p style="color: #000 !important"><b> Position:</b>Intern</p>
            <div class="job-description">
                <p style="color: #000 !important">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex expedita
                    aspernatur quibusdam nulla velit et hic eligendi consequatur incidunt, mollitia, amet ab deleniti ea!
                    Obcaecati earum sapiente numquam ipsum tempore. Ab molestiae sint autem eos, voluptatem esse itaque
                    saepe veritatis.</p>
            </div> --}}

            @php

                $career_page = App\Models\StaticPage::all()->where('name','carreers');
                $description = '';
                $career_page = $career_page->first();
                if(!is_null($career_page)){
                    $description = $career_page->description;
                }
            @endphp
                <div class="row static-content">
                    {!! $description !!}
                </div>



        </div>
        <div class="col-12 mt-4">
            <div class="text-center">
                <h4>Apply Online</h4>
            </div>
            <div class="career-form row col-12 contact-us-form justify-content-center ms-2 ">
                <form class="row contact-us-form-1 mb-4">
                    <div>
                        <h6>Personal Details</h6>
                    </div>
                    <div class="mb-3 col-md-12">
                        <input type="text" class="form-control exampleInputEmail1" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="First Name*">
                    </div>
                    <div class="mb-3 col-md-12">
                        <input type="text" class="form-control exampleInputEmail1" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Last Name*">
                    </div>
                    <div class="mb-3 col-12">
                        <input type="email" class="form-control exampleInputEmail1 flatpickr-input birthdate"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Birthdate*">
                    </div>
                    <div class="mb-3 col-md-12">
                        <input type="text" class="form-control exampleInputEmail1" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="City*">
                    </div>
                    <div class="mb-3 col-12">
                        <textarea placeholder="Address" class="form-control exampleInputEmail1" name="comment" style="height: 100px"></textarea>
                    </div>
                    <div>
                        <h6>Personal Details</h6>
                    </div>
                    <div class="mb-3 col-md-12">
                        <input type="text" class="form-control exampleInputEmail1" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Mobile Number*">
                    </div>
                    <div class="mb-3 col-md-12">
                        <input type="email" class="form-control exampleInputEmail1" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="EMAIL ID*">
                    </div>
                    <div>
                        <h6>Professional Details</h6>
                    </div>
                    <div class="mb-3 col-md-12">
                        <select class="form-control exampleInputEmail1 form-select" aria-label="Default select example">
                            <option selected>Job Category</option>
                            <option value="sales">Sales</option>
                            <option value="marketing">Marketing</option>
                            <option value="technical">TechnicaL</option>
                            <option value="hr">HR</option>
                            <option value="programming">Programming</option>
                            <option value="digital">Digital</option>
                            <option value="finance">Finance</option>
                            <option value="scheduling">Scheduling</option>
                            <option value="administration">Administration</option>
                            <option value="other">Other</option>
                          </select>
                    </div>
                    <div class="mb-3 col-md-12">
                        <textarea placeholder="Breif Profile" class="form-control exampleInputEmail1" name="comment" style="height: 100px"></textarea>
                    </div>

                    <div>
                        <h6>Work Experience</h6>
                    </div>
                    <div class="mb-3 col-md-12">
                        <select class="form-control exampleInputEmail1 form-select" aria-label="Default select example">
                            <option selected>Job Category</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="exampleInputEmail1" class="form-label">Upload Resume:</label>
                        <input type="file" class="form-control exampleInputEmail1" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="EMAIL ID*">
                    </div>

                    <div>
                        <button type="button" class="btn btn-primary" style="background-color: #4A43C1">Submit Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>s
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script>
        const fp = flatpickr(".birthdate", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        }); // flatpickr
    </script>
@endsection
