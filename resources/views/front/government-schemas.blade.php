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
        <div class="row goverment-schemes-container">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 ps-2">
                @php
                    $government_schemas = App\Models\Blog::where('category','=','government_schemas')->get();
                    // dd($government_schemas);
                    $count = 0;
                @endphp

                @foreach ($government_schemas as $blog)
                    @php
                        $count++
                    @endphp
                    @if ($count > 0)
                    <div class="goverment-schemes-section">

                        <div class="blog-heading mt-4 ms-0 d-flex mb-4">
                            <img src="{{ asset('images/icons/indian_constitution_1.png') }}" style="height: 30px"/>
                            <div class="title ms-4"><h4>{{ $blog->title }}</h4></div>
                        </div>
                        <img src="{{ asset('storage/blog/')."/".$blog->images }}"
                            class="img-fluid rounded w-100 goverment-article-img-1 government-schemas-article-img-main"/>
                        <div class="blog-content p-2 ms-0">
                            <p> {!! $blog->description !!} </p>
                        </div>
                        <div class="d-flex w-100 align-items-center">
                            <a class="is-helpful" href="javascript:void(0)" style="text-decoration: none; color: #000">
                                <img src="{{ asset('images/icons/thumb-up.png') }}"/>
                                <span>is helpful?</span>
                            </a>
                            <span class="d-none">
                                <svg width="50px" height="50px" viewBox="0 0 24.00 24.00" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">

                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                            stroke="#000000" stroke-width="0.4800000000000001" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.9973 9.33059C11.1975 8.4216 9.8639 8.17708 8.86188 9.00945C7.85986 9.84182 7.71879 11.2335 8.50568 12.2179C8.97361 12.8033 10.1197 13.8531 10.9719 14.6079C11.3237 14.9195 11.4996 15.0753 11.7114 15.1385C11.8925 15.1926 12.102 15.1926 12.2832 15.1385C12.4949 15.0753 12.6708 14.9195 13.0226 14.6079C13.8748 13.8531 15.0209 12.8033 15.4888 12.2179C16.2757 11.2335 16.1519 9.83306 15.1326 9.00945C14.1134 8.18584 12.797 8.4216 11.9973 9.33059Z"
                                            stroke="#000000" stroke-width="0.4800000000000001" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>

                                </svg>
                            </span>
                            <span class="comment ps-2 d-none">
                                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.1266 22.1995C16.7081 22.5979 17.4463 23.0228 18.3121 23.3511C19.9903 23.9874 21.244 24.0245 21.8236 23.9917C23.1167 23.9184 23.2907 23.0987 22.5972 22.0816C21.8054 20.9202 21.0425 19.6077 21.1179 18.1551C22.306 16.3983 23 14.2788 23 12C23 5.92487 18.0751 1 12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23C13.4578 23 14.8513 22.7159 16.1266 22.1995ZM12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C13.3697 21 14.6654 20.6947 15.825 20.1494C16.1635 19.9902 16.5626 20.0332 16.8594 20.261C17.3824 20.6624 18.1239 21.1407 19.0212 21.481C19.4111 21.6288 19.7674 21.7356 20.0856 21.8123C19.7532 21.2051 19.4167 20.4818 19.2616 19.8011C19.1018 19.0998 18.8622 17.8782 19.328 17.2262C20.3808 15.7531 21 13.9503 21 12C21 7.02944 16.9706 3 12 3Z"
                                        fill="#697488" />
                                </svg>
                            </span>
                            <span class="option-btn ms-auto d-none"><svg width="35px" height="35px" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" fill="#000000" stroke="#000000"
                                    stroke-width="0.00024000000000000003">

                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                    <g id="SVGRepo_iconCarrier">

                                        <path
                                            d="M17.5 14a1.5 1.5 0 1 1 1.5-1.5 1.502 1.502 0 0 1-1.5 1.5zM14 12.5a1.5 1.5 0 1 0-1.5 1.5 1.502 1.502 0 0 0 1.5-1.5zm-5 0A1.5 1.5 0 1 0 7.5 14 1.502 1.502 0 0 0 9 12.5zm13.8 0A10.3 10.3 0 1 1 12.5 2.2a10.297 10.297 0 0 1 10.3 10.3zm-1 0a9.3 9.3 0 1 0-9.3 9.3 9.31 9.31 0 0 0 9.3-9.3z" />

                                        <path fill="none" d="M0 0h24v24H0z" />

                                    </g>

                                </svg></span>
                        </div>
                    </div>

                    @else
                        Sorry no Data Found!!!
                    @endif


                @endforeach

            </div>
            <div class="col-md-12 col-lg-4 col-xl-4 m-0 p-0">
                <div class="trending-reads">
                    <h4 class="text-secondary">Trending Reads</h4>
                    <div class="trending-reads-items pt-4">
                        @php
                            $trending_reads = App\Models\Blog::where('category', '=', 'trending_reads')
                                ->latest()
                                ->take(5)
                                ->get();
                        @endphp
                        @foreach ($trending_reads as $blog)
                            <div class="trending-reads-item row m-0 p-0 d-flex mb-4">
                                <div class="trending-reads-img p-0 m-0 col-sm-auto col-md-12 col-lg-12 col-xl-6">
                                    <a href="{{ route('front-blog', $blog->id) }}">
                                        <img src="{{ asset('storage/blog/') . '/' . $blog->images }}"
                                            class="img-fluid rounded-4" style="max-width: 170px;" /></a>
                                </div>
                                <div class="col-sm-auto col-md-12 col-lg-12 col-xl-6">
                                    <a href="{{ route('front-blog', $blog->id) }}" style="text-decoration: none !important;">
                                        <p class="blog-title my-2">{{ Str::substr($blog->title, 0, 60) . '....' }}</p>
                                    </a>
                                    <img src="{{ asset('images/logo/radio_rajkot.png') }}"
                                        class="profile-user blog-author-img" style="max-width: 30px;border-radius: 100%;" />
                                    <span class="blog-author-name">Radio Rajkot</span>
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
        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script>
            $('.is-helpful').click(function(){
                $(this).toggleClass('is-helpful-active');
            });
        </script>
    @endsection
