@extends('front.layouts.main')

@section('title')
    89.6 FM Podcasts
@endsection
@section('description')
    89.6 FM Radio Rajkot Radio FM Podcasts
@endsection

@section('meta')
    <meta name="keywords" content="fm, 89.6, 89.6 FM, radio rajkot, Radio Rajkot" />
@endsection
@section('styles')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css"
        integrity="sha512-oAvZuuYVzkcTc2dH5z1ZJup5OmSQ000qlfRvuoTTiyTBjwX1faoyearj8KdMq0LgsBTHMrRuMek7s+CxF8yE+w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('front-assets/css/custome.css?v=').time() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 ps-2">
            <div class="col-md-12">
                <div class="photo-stories pt-5">
                    <div class="photo-story">
                        <h4 class="mb-4">Photo Stories</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="test d-block col-12 ">
                                    <button type="button" class="" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <img src="{{ asset('images/stories/pexels-flo-dahm-699459.jpg') }}"
                                            class="img-fluid rounded photo-story-img " />
                                    </button>
                                    <div class="col-12">Nisi enim commodo aliqua quis Lorem laborum ad non occaecat ea officia enim.</div>
                                </div>


                            </div>
                        </div>
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{ asset('images/stories/pexels-lisa-fotios-3197390.jpg') }}"
                                class="img-fluid rounded photo-story-img m-4" />
                        </button>
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{ asset('images/stories/pexels-polina-zimmerman-3778619.jpg') }}"
                                class="img-fluid rounded photo-story-img m-4" />
                        </button>
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{ asset('images/stories/pexels-tranmautritam-326504.jpg') }}"
                                class="img-fluid rounded photo-story-img m-4" />
                        </button>
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{ asset('images/stories/pexels-flo-dahm-699459.jpg') }}"
                                class="img-fluid rounded photo-story-img m-4" />
                        </button>
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{ asset('images/stories/pexels-lisa-fotios-3197390.jpg') }}"
                                class="img-fluid rounded photo-story-img m-4" />
                        </button>
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{ asset('images/stories/pexels-polina-zimmerman-3778619.jpg') }}"
                                class="img-fluid rounded photo-story-img m-4" />
                        </button>
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{ asset('images/stories/pexels-tranmautritam-326504.jpg') }}"
                                class="img-fluid rounded photo-story-img m-4" />
                        </button>
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{ asset('images/stories/pexels-flo-dahm-699459.jpg') }}"
                                class="img-fluid rounded photo-story-img m-4" />
                        </button>
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{ asset('images/stories/pexels-lisa-fotios-3197390.jpg') }}"
                                class="img-fluid rounded photo-story-img m-4" />
                        </button>
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{ asset('images/stories/pexels-polina-zimmerman-3778619.jpg') }}"
                                class="img-fluid rounded photo-story-img m-4" />
                        </button>
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{ asset('images/stories/pexels-tranmautritam-326504.jpg') }}"
                                class="img-fluid rounded photo-story-img m-4" />
                        </button>

                        <!-- Button trigger modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="background-color: transparent !important; border: 0px;">
                                    <div class="modal-body">
                                        <div data-slide="slide" class="slide">
                                            <div class="slide-items">
                                                <img src="{{ asset('images/stories/pexels-flo-dahm-699459.jpg') }}"
                                                    alt="Img 1">
                                                <img src="{{ asset('images/stories/pexels-lisa-fotios-3197390.jpg') }}"
                                                    alt="Img 2">
                                                <img src="{{ asset('images/stories/pexels-polina-zimmerman-3778619.jpg') }}"
                                                    alt="Img 3">
                                                <img src="{{ asset('images/stories/pexels-tranmautritam-326504.jpg') }}"
                                                    alt="Img 4">
                                            </div>
                                            <nav class="slide-nav">
                                                <div class="slide-thumb"></div>
                                                <button class="slide-prev">Prev</button>
                                                <button class="slide-next">Next</button>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
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
    {{-- <script src="./slide-stories.js"></script> --}}
    <script src="{{ asset('slider/slide-stories.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
@endsection
