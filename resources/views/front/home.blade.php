@extends('front.layouts.main')

@section('title')
    89.6 FM
@endsection
@section('description')
    Discover endless entertainment and community engagement with Radio Rajkot - your 24/7 destination for captivating
    programming. Tune in to our radio
@endsection

@section('meta')
    <meta name="keywords" content="fm,89.6, 89.6 FM, radio rajkot, Radio Rajkot" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
@endsection
@section('styles')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('front-assets/css/custome.css?v=') . time() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <style>
        /* Core functionality */
        #animated-text-strip {
            display: flex;
            flex-flow: row nowrap;
            align-items: center;
            overflow: hidden;
        }

        #animated-text-strip .marquee {
            white-space: nowrap;
            animation: marquee 25s linear infinite;
            max-width: none;
        }

        @keyframes marquee {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(-100%, 0);
            }
        }

        /* Styles for the sake of the demonstration */
        #animated-text-strip {
            background: #f76767;
            padding: 1rem 0;
        }

        .marquee {
            font-family: 'Open Sans', sans-serif;
            font-size: 1rem;
            font-weight: 200;
            text-transform: uppercase;
            color: white;
        }

        .blog-title {
            color: #3a3939;
            font-size: large
        }

        .playButton .play-icon {
            box-shadow: 0px 0px 25px 3px rgba(22, 51, 180, 0.8);
        }

        .playButton .play-icon::before {
            -webkit-animation-delay: 0s;
            animation-delay: 0s;
            -webkit-animation: pulsate1 2s;
            animation: pulsate1 2s;
            -webkit-animation-direction: forwards;
            animation-direction: forwards;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
            -webkit-animation-timing-function: steps;
            animation-timing-function: steps;
            opacity: 1;
            border-radius: 50%;
            border: 5px solid rgba(255, 255, 255, .75);
            top: -30%;
            left: -30%;
            background: rgba(198, 16, 0, 0);
        }

        @-webkit-keyframes pulsate1 {
            0% {
                -webkit-transform: scale(0.6);
                transform: scale(0.6);
                opacity: 1;
                box-shadow: inset 0px 0px 25px 3px rgba(255, 255, 255, 0.75), 0px 0px 25px 10px rgba(255, 255, 255, 0.75);
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0;
                box-shadow: none;

            }
        }

        @keyframes pulsate1 {
            0% {
                -webkit-transform: scale(0.6);
                transform: scale(0.6);
                opacity: 1;
                box-shadow: inset 0px 0px 25px 3px rgba(255, 255, 255, 0.75), 0px 0px 25px 10px rgba(255, 255, 255, 0.75);
            }

            100% {
                -webkit-transform: scale(1, 1);
                transform: scale(1);
                opacity: 0;
                box-shadow: none;

            }
        }
    </style>
@endsection
@section('content')
    <div class="row justify-content-center ms-2">
        <div class="col-md-7 ps-2">
            <div id="live-show-section">
                <h4>Live Show</h4>
                <div class="live-show-img pt-3 d-flex align-items-start row">
                    <audio src="https://a1.asurahosting.com:8030/radio.mp3" id="audio"></audio>
                    <img src="{{ asset('images/live-show/rj_purvi.png') }}"
                        class="img-fluid shadow-lg img-thumbnail rounded-5 col-md-6 col-sm-12 col-lg-6 my-auto mx-auto"
                        id="live-show-img" />
                    <audio id="audioPlayer" class="d-none" controls>
                        <source src="" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                    {{-- <button id="playButton">Play</button> --}}
                    <div class="col-md-12 col-lg-6 col-sm-12 lg:ms-2 md:ms-2">
                        <div class="col-12 mt-3">
                            <h4 class="show-name" id="live-show-name">The SunShine Show</h4>
                            <p class="text-secondary rj-name" id="live-show-rj-name">Rj Purvi</p>
                            <p class="show-detail" id="live-show-description">The Morning Show its start with bang with RJ
                                Purvi who has learn
                                and adopt our cultur,roots and life sense throuths which shw will make your morning
                                motivated
                                and enrgatic.
                            </p>
                        </div>
                        <span class="playButton" id="playButton">
                            <button class="btn play-icon px-3 mx-auto col-md-auto">
                                <div class="status-icon">
                                    <svg width="40px" height="40px" viewBox="0 0 24 24" fill="#000000"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM10.6935 15.8458L15.4137 13.059C16.1954 12.5974 16.1954 11.4026 15.4137 10.941L10.6935 8.15419C9.93371 7.70561 9 8.28947 9 9.21316V14.7868C9 15.7105 9.93371 16.2944 10.6935 15.8458Z"
                                            fill="#ffffff" />
                                    </svg>
                                    <span class="ms-2 playButtonTxt">Play Now</span>
                                </div>
                            </button>
                        </span>
                        <input type="range" id="volumeRange" min="0" max="1" step="0.01" value="1"
                            class="d-none">
                        <button id="muteButton" class="d-none"><i class="bi bi-volume-up"></i></button>
                        <span class="pause-btn d-none">
                            <button class="btn play-icon px-3 mx-auto col-md-auto pause-btn-1">
                                <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM8 8C8 7.44772 8.44772 7 9 7H10C10.5523 7 11 7.44772 11 8V16C11 16.5523 10.5523 17 10 17H9C8.44772 17 8 16.5523 8 16V8ZM13 8C13 7.44772 13.4477 7 14 7H15C15.5523 7 16 7.44772 16 8V16C16 16.5523 15.5523 17 15 17H14C13.4477 17 13 16.5523 13 16V8Z"
                                        fill="#ffffff" />
                                </svg>
                                <span class="ms-2">Pause</span>
                            </button>
                        </span>
                        <span class="opiton-btn-1">
                            <button class="btn m-0 p-0 ms-4" style="border-radius: 100%">
                                <svg height="40px" width="40px" version="1.1" id="_x32_"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 512 512" xml:space="preserve" fill="#4A43C1">

                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <path class="st0"
                                                d="M256,0C114.618,0,0,114.618,0,256c0,141.383,114.618,256,256,256c141.383,0,256-114.617,256-256 C512,114.618,397.383,0,256,0z M373.641,366.297H138.352v-36.766h235.289V366.297z M373.641,274.383H138.352v-36.758h235.289 V274.383z M373.641,182.469H138.352v-36.758h235.289V182.469z" />
                                        </g>
                                    </g>

                                </svg>
                            </button>
                        </span>
                        <div class="dropdown-menu" x-placement="right-start" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item mute-audio-1" onclick="hideDropeDown()"
                                href="javascript:void(0);">Mute</a>
                            <a class="dropdown-item" onclick="hideDropeDown()" id="follow_rj"
                                href="https://www.instagram.com/rj_purvi/" target="_blank">Follw Rj</a>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-12 mt-4">
                <div id="animated-text-strip">
                    @php
                        $settings = App\Models\Setting::first();
                        $count = 3;
                    @endphp
                    @for ($i = 0; $i < $count; $i++)
                        <span class="marquee">{{ $settings->home_page_text }}&nbsp;</span>
                    @endfor
                </div>
            </div>
            <div class="col-md-12">
                <div class="photo-stories pt-5">
                    <div class="photo-story">
                        <h4 class="mb-4">Top News</h4>
                        <!-- Slider main container -->
                        <div class="swiper mySwiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">

                                @php
                                    $blogs = App\Models\Blog::all();

                                    $top_news = [];
                                    $top_music_articles = [];
                                    $trending_reads = [];
                                    $astrology = [];
                                    $music = [];
                                    $cricket = [];
                                    $bollywood = [];
                                    $movie_reviews = [];
                                    $news_around_world = [];
                                    $other_category = [];

                                    foreach ($blogs as $blog) {
                                        if ($blog->category == 'top_news') {
                                            array_push($top_news, $blog);
                                        } elseif ($blog->category == 'top_music_articles') {
                                            array_push($top_music_articles, $blog);
                                        } elseif ($blog->category == 'trending_reads') {
                                            array_push($trending_reads, $blog);
                                        } elseif ($blog->category == 'astrology') {
                                            array_push($astrology, $blog);
                                        } elseif ($blog->category == 'music') {
                                            array_push($music, $blog);
                                        } elseif ($blog->category == 'cricket') {
                                            array_push($cricket, $blog);
                                        } elseif ($blog->category == 'bollywood') {
                                            array_push($bollywood, $blog);
                                        } elseif ($blog->category == 'movie_reviews') {
                                            array_push($movie_reviews, $blog);
                                        } elseif ($blog->category == 'news_around_world') {
                                            array_push($news_around_world, $blog);
                                        } else {
                                            array_push($other_category, $blog);
                                        }
                                    }
                                @endphp
                                @foreach ($top_news as $top_news1)
                                    <div class="swiper-slide">
                                        <a href="{{ route('front-blog', $top_news1->id) }}">
                                            <button>
                                                <img src="{{ asset('storage/blog/') . '/' . $top_news1->images }}"
                                                    class="img-fluid rounded photo-story-img" />
                                                <br />
                                                <p class="w-100 text-start blog-title mt-2">
                                                    {{ substr($top_news1->title, 0, 150) . '....' }}
                                                </p>
                                            </button></a>
                                    </div>
                                @endforeach
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination sm:d-none"></div>

                            <!-- If we need navigation buttons -->
                            {{-- <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div> --}}

                            <!-- If we need scrollbar -->
                            {{-- <div class="swiper-scrollbar"></div> --}}
                        </div>

                        <!-- Button trigger modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog min-vh-100">
                                <div class="modal-content" style="background-color: transparent !important; border: 0px;">
                                    <button type="button" class="btn-close color-white ms-auto" data-bs-dismiss="modal"
                                        aria-label="Close"
                                        style="border-radius: 20%;background-color: #fff;padding: 5px;position: relative;z-index: 999;top: 34px;
                                    right: 28px;"></button>
                                    <div class="modal-body position-absolute p-0">
                                        <div data-slide="slide" class="slide">
                                            <div class="slide-items">
                                                <img src="{{ asset('images/stories/pexels-flo-dahm-699459.jpg') }}"
                                                    alt="Img 1" class="min-vh-100 story-slide">
                                                <img src="{{ asset('images/stories/pexels-lisa-fotios-3197390.jpg') }}"
                                                    alt="Img 2" class="min-vh-100 story-slide">
                                                <img src="{{ asset('images/stories/pexels-polina-zimmerman-3778619.jpg') }}"
                                                    alt="Img 3" class="min-vh-100 story-slide">
                                                <img src="{{ asset('images/stories/pexels-tranmautritam-326504.jpg') }}"
                                                    alt="Img 4" class="min-vh-100 story-slide">
                                            </div>
                                            <nav class="slide-nav">
                                                <div class="slide-thumb"></div>
                                                <button class="slide-prev">Prev</button>
                                                <button class="slide-next">Next</button>
                                                <span>X</span>
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
        <div class="col-md-4 m-0 p-0">
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
    <script src="{{ asset('slider/slide-stories.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        @php
            $current_time = now()->format('H:i:s');
            $questions = \DB::table('show_schedule')->whereTime('start_time', '<=', $current_time)->whereTime('end_time', '>=', $current_time)->first();
        @endphp

        @if ($questions != null)
            let img = "{{ asset('storage/image/show/' . $questions->show_banner) }}";
            $("#live-show-img").attr("src", img);
            $("img").show();
            $('#live-show-name').text(`{{ $questions->show_name }}`);
            $('#live-show-rj-name').text(`{{ $questions->rj_name }}`);
            $('#live-show-description').text(`{{ $questions->show_description }}`);
            $('#follow_rj').attr('href', '{{ $questions->rj_follow }}')
        @else
        @endif

        window.setInterval(function() {
            @php
                $current_time = now()->format('H:i:s');
                $questions = \DB::table('show_schedule')->whereTime('start_time', '<=', $current_time)->whereTime('end_time', '>=', $current_time)->first();
            @endphp
            @if ($questions != null)
                let img = "{{ asset('storage/image/show/' . $questions->show_banner) }}";
                $("#live-show-img").attr("src", img);
                $("img").show();
                $('#live-show-name').text(`{{ $questions->show_name }}`);
                $('#live-show-rj-name').text(`{{ $questions->rj_name }}`);
                $('#live-show-description').text(`{{ $questions->show_description }}`);
                $('#follow_rj').attr('href', '{{ $questions->rj_follow }}')
            @else
            @endif
        }, 50000);


        var audioPlayer = document.getElementById("audioPlayer");
        var playButton = document.getElementById("playButton");
        let flage = false;

        let playButtonText = $('.status-icon');
        var volumeRange = document.getElementById("volumeRange");
        var muteButton = document.getElementById("muteButton");
        volumeRange.addEventListener("input", function() {
            var volumeValue = parseFloat(volumeRange.value);
            audioPlayer.volume = volumeValue;
            updateVolumeText(volumeValue);
        });
        // Add a click event listener to the mute button
        muteButton.addEventListener("click", function() {
            if (audioPlayer.volume === 0) {
                // If the audio is muted, unmute it
                audioPlayer.volume = volumeRange.value;

                playButtonText.html("");
                playButtonText.html(`
                                <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM8 8C8 7.44772 8.44772 7 9 7H10C10.5523 7 11 7.44772 11 8V16C11 16.5523 10.5523 17 10 17H9C8.44772 17 8 16.5523 8 16V8ZM13 8C13 7.44772 13.4477 7 14 7H15C15.5523 7 16 7.44772 16 8V16C16 16.5523 15.5523 17 15 17H14C13.4477 17 13 16.5523 13 16V8Z"
                                        fill="#ffffff" />
                                </svg>
                                <span class="ms-2">Pause</span>
                            `);


            } else {
                // Otherwise, mute it
                audioPlayer.volume = 0;

                playButtonText.html("");
                playButtonText.html(`
                                <svg width="40px" height="40px" viewBox="0 0 24 24" fill="#000000"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22ZM10.6935 15.8458L15.4137 13.059C16.1954 12.5974 16.1954 11.4026 15.4137 10.941L10.6935 8.15419C9.93371 7.70561 9 8.28947 9 9.21316V14.7868C9 15.7105 9.93371 16.2944 10.6935 15.8458Z"
                                        fill="#ffffff" />
                                </svg>
                                <span class="ms-2 playButtonTxt">Play Now</span>
                            `);
            }
            updateVolumeText(audioPlayer.volume);
        });

        // Function to update the volume text based on the current volume level
        function updateVolumeText(volume) {
            if (volume === 0) {
                // muteButton.html(`<i class="bi bi-volume-up"></i>`);
            } else {
                // muteButton.textContent = "Mute";
                // muteButton.html(`<i class="bi bi-volume-mute"></i>`);
            }
        }



        audioPlayer.volume = 1.0;



        // Set the initial source URL for the audio
        audioPlayer.src = "https://a1.asurahosting.com:8030/radio.mp3";

        // Add a click event listener to the play button
        playButton.addEventListener("click", function() {

            console.log(flage);
            if (flage == false) {
                audioPlayer.play();
                playButtonText.html("");
                playButtonText.html(`
                                <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM8 8C8 7.44772 8.44772 7 9 7H10C10.5523 7 11 7.44772 11 8V16C11 16.5523 10.5523 17 10 17H9C8.44772 17 8 16.5523 8 16V8ZM13 8C13 7.44772 13.4477 7 14 7H15C15.5523 7 16 7.44772 16 8V16C16 16.5523 15.5523 17 15 17H14C13.4477 17 13 16.5523 13 16V8Z"
                                        fill="#ffffff" />
                                </svg>
                                <span class="ms-2">Pause</span>
                            `);
                flage = true;
            } else {
                muteButton.click();
            }
        });

        $(document).on('click', '.opiton-btn-1', function() {
            $('.dropdown-menu').toggleClass('show');
        });
        $('.is-helpful').click(function() {
            $(this).toggleClass('is-helpful-active');
        });

        $('.mute-audio-1').click(function() {
            $('#muteButton').click();
            let txt = $('.mute-audio-1').html();
            if (txt == 'Mute') {
                $('.mute-audio-1').html('unmute');
            } else {
                $('.mute-audio-1').html('Mute');
            }
        });

        $('iframe').addClass('video-container');

        function hideDropeDown() {
            $('.dropdown-menu').removeClass('show');
        }

        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 50,
                },
            },
        });

        var swiper = new Swiper(".mySwiper1", {
            slidesPerView: 1,
            spaceBetween: 200,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                480: {
                    slidesPerView: 1,
                    spaceBetween: 100,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 50,
                }
            },
        });


        var swiper = new Swiper(".mySwiper2", {
            slidesPerView: 2,
            spaceBetween: 20,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                480: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                }
            },
        });
    </script>
@endsection
