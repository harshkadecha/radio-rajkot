@extends('front.layouts.main')

@section('title')89.6 FM @endsection
@section('description') 89.6 FM Radio Rajkot Radio FM @endsection

@section('meta')
    <meta name="keywords" content="fm, 89.6, 89.6 FM, radio rajkot, Radio Rajkot" />
@endsection
@section('styles')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('front-assets/css/custome.css?v=').time() }}">
@endsection
@section('content')
    <div class="row container">
        <div class="text-center contact-us-heading-section">
            <h1>Contact us</h1>
        </div>
        <div class="col-sm-12 col-md-6">
            {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.530375576535!2d70.79567077506933!3d22.295772679689765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959cbed1d07f5e3%3A0x368b56dea48c5f8d!2sRadio%20Rajkot%2C%2089.6!5e0!3m2!1sen!2sin!4v1710136111023!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.530375576535!2d70.79567077506933!3d22.295772679689765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959cbed1d07f5e3%3A0x368b56dea48c5f8d!2sRadio%20Rajkot%2C%2089.6!5e0!3m2!1sen!2sin!4v1710136111023!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" ></iframe><br />



        </div>
        <div class="col-sm-12 col-md-6">
            <div class="address-section">

                    1009, Aalap B Complex,Opp<br/>
                    Shashtri Maidan,Near<br/>
                    Limda Chowk<br/>
                    Rajkot-360001<br/>
                    <br/>
                    Email: contact.radiorajkot@gmail.com<br/>
                    Call us at +91 99799 78960<br/>
                    <br/>
                    Stay Connected<br/>
                    <span>
                        <a href="https://www.instagram.com/89.6_radio.rajkot/" target="_blank"><img src="{{ asset('images/icons/social/instagram.png') }}" class="img-fluid social-icons me-2"/></a>
                        <a href="https://twitter.com/RajkotRadio" target="_blank"><img src="{{ asset('images/icons/social/twitter.png') }}" class="img-fluid social-icons me-2"/></a>
                        <a href="https://www.facebook.com/89.6RadioRajkot" target="_blank"><img src="{{ asset('images/icons/social/facebook.png') }}" class="img-fluid social-icons me-2"/></a>
                        <a href="https://www.youtube.com/@RADIORAJKOT" target="_blank"><img src="{{ asset('images/icons/social/youtube.png') }}" class="img-fluid social-icons"/></a>
                    </span>


            </div>
        </div>
        <div class="row col-12 contact-us-form justify-content-center ms-2">
            <div class="text-center contact-us-heading-section mt-4">
                <h2>QUERY FORM</h2>
                <p>Kindly share your valuable feedback in comment sanction and if you wish to work with us then drop us a line. Thanks.</p>
            </div>
            <div class="row w-100 justify-content-center m-0 p-0">
                <form class="row contact-us-form-1 mb-4">
                    <div class="mb-3 col-md-6">
                        <input type="email" class="form-control exampleInputEmail1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Name*">
                      </div>
                      <div class="mb-3 col-md-6">
                        <input type="email" class="form-control exampleInputEmail1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email*">
                      </div>
                      <div class="mb-3 col-12">
                        <input type="email" class="form-control exampleInputEmail1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Subject*">
                      </div>
                      <div class="mb-3 col-12">
                        <textarea placeholder="Comments" class="form-control exampleInputEmail1" name="comment" style="height: 100px"></textarea>
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
@endsection


