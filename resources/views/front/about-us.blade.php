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
        <style>
            .ql-align-center{
                text-align: center;
            }
        </style>
@endsection
@section('content')
    <div class="row static-content" style="text-align: justify !important;">
        <div class="text-center">
            <h3>ABOUT US</h3>
        </div>
        @isset($content->description)
            {!! $content->description !!}
        @endisset
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
    <script>

        $('document').ready(function(){
            $('img').css('max-height','400px');
            $('img').parent('p').css('justify-content','center');
            $('img').parent('p').addClass('d-flexx');
        })
    </script>
@endsection


