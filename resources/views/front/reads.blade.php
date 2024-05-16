@extends('front.layouts.main')

@section('title')
    89.6 FM
@endsection
@section('description')
    89.6 FM Radio Rajkot Radio FM
@endsection

@section('meta')
    <meta name="keywords" content="fm,89.6,89.6 FM,radio rajkot,Radio Rajkot" />
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
        .blog-title{
            color: #3a3939;
            font-size: large
        }
    </style>
@endsection

@section('content')
    <div class="row static-content">
        <div class="col-md-12 pt-4 pb-2 ms-4">
            <div class="justify-content-center">
                <div class="mb-4">
                    <h1 class="pb-2 d-inline pe-4">Blogs</h1>
                </div>
                @php
                    $reads = App\Models\Blog::latest()->get();
                @endphp
                <div class="blog-wrapper row mt-2">
                    @foreach ($reads as $blog)
                        <div class="blog-container zoom-in-out-box col-sm-12 col-md-4">
                            <div class="blog-heading">
                                <a href="{{ route('front-blog',$blog->id) }}" style="text-decoration: none !important;">
                                <img src="{{ asset('storage/blog/') . '/' . $blog->images }}" class="img-fluid cover-img  rounded-4" />
                            </a>
                            </div>
                            <div class="blog-body">
                                <a href="{{ route('front-blog',$blog->id) }}" style="text-decoration: none !important;">
                                <p class="blog-title">{!! $blog->title !!}</p>
                            </a>
                            </div>
                        </div>
                    @endforeach
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
@endsection
