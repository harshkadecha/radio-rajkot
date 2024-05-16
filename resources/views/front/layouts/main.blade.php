<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <link rel="apple-touch-icon" href="{{ asset('images/ico/apple-touch-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/ico/favicon.ico') }}">
    <link rel=”icon” type=“image/x-icon” href="{{ asset('images/ico/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('images/ico/site.webmanifest') }}">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | Radio Rajkot</title>


    <meta name="radio-rajkot" content="RadioRajkot">

    @include('front.general.styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/loader.css') }}">

    <!-- Primary Meta Tags -->
    <meta name="title" content="radio rajkot" />
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="radiorajkot.in,radio rajot,fm,89.6,89.6 FM,radio rajkot,Radio Rajkot" />
    <meta name="robots" content="index,follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="2 days">
    <meta name="author" content="radio rajkot">

    @yield('meta')
    @yield('styles')

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:title" content="radio rajkot" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:image" content="{{ asset('images/logo/radio_rajkot_final_logo.jpg') }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ Request::url() }}" />
    <meta property="twitter:title" content="RadioRajkot" />
    <meta property="twitter:description" content="@yield('description')" />
    <meta property="twitter:image" content="{{ asset('images/logo/radio_rajkot_final_logo.jpg') }}" />
</head>

<body class="" style="min-height: 100vh;">
    @include('front.general.loader')

    <main>
        @include('front.general.sidebar')
        @include('front.general.header')

        <div id="app">
            @yield('content')
        </div>

        @include('front.general.footer')

        @include('front.general.scripts')
    </main>
</body>

</html>
