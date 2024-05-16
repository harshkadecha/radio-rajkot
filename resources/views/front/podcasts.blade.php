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
    <style>
        .videoWrapper {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 */
            padding-top: 25px;
            height: 0;
            display: flex;
        }

        .videoWrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 30%;
            height: 60%;
            display: flex;
        }
        iframe{
            width: 100%;
            height: 200px;
            border-radius:10px;
        }
    </style>
@endsection

@section('content')
    <div class="row px-4 ms-2">
        <div class="col-md-12 ps-2">
            <div class="row justify-content-center">
                <h4 class="pt-5">Our Popular Podcasts</h4>
                @php
                    $podcasts = App\Models\Podcast::latest()->get();
                @endphp
                @if (sizeof($podcasts) > 0)
                    @foreach ($podcasts as $podcast)
                        <div class="col-md-4">
                            {!! $podcast->description !!}
                        </div>
                    @endforeach
                @else
                <h2>Something grate is Coming soon..</h2>
                @endif
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
