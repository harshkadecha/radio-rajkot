@extends('front.layouts.main')

@section('title') 89.6 FM Live Radio @endsection
@section('description') 89.6 FM Radio Rajkot Radio FM Live Radio @endsection

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
            <div id="live-show-section">
                <h4 class="mt-3">Live Show</h4>
                <div class="live-show-img pt-3 d-flex align-items-start row">
                    <audio src="https://a1.asurahosting.com:8030/radio.mp3" id="audio"></audio>
                    <img src="{{ asset('images/live-show/rj_purvi.png') }}"
                        class="img-fluid shadow-lg img-thumbnail rounded-5 live-show-poster-1 col-md-6 col-sm-12 col-lg-6 me-5" />
                        <audio id="audioPlayer" class="d-none" controls>
                            <source src="" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    <div class="col-md-6 col-lg-6 col-sm-12 lg:ms-2 md:ms-2">
                        <div class="col-12 mt-3">
                            <h4 class="show-name">The SunShine Show</h4>
                            <p class="text-secondary rj-name">Rj Purvi</p>
                            <p class="show-detail">Ut adipisicing minim ipsum consectetur minim culpa Lorem ea ad ipsum in
                                nostrud pariatur.
                                Consectetur aliqua aute eiusmod ut velit fugiat labore nulla incididunt irure culpa elit
                                magna.
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
                            <button class="btn play-icon px-3 mx-auto col-6 pause-btn-1">
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
                                <div class="dropdown-menu" x-placement="right-start" aria-labelledby="navbarDropdown" style="margin: 0 180px !important;">
                                    <a class="dropdown-item mute-audio-1" href="javascript:void(0);">Mute</a>
                                    <a class="dropdown-item" href="https://www.instagram.com/rj_purvi/" target="_blank">Follw Rj</a>
                                  </div>

                        </span>
                    </div>
                </div>


            </div>



            <div class="col-md-12 pt-4  pb-2 meet-our-rj-section meet-our-rj-sectio-1">
                <div>
                    <h4 class="mb-4">Meet Our RJs</h4>
                </div>
                <div class="swiper mySwiper1">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="card rj-card shadow row m-0 p-0">
                                <div class="col-6">
                                    <img src="{{ asset('images/rj-card/rj_purvi.png') }}" class="img-fluid w-100s" />
                                    <h6 class="text-primary mb-0">Rj Purvi</h6>
                                    <div class="text-secondary rj-details fs-6 mt-2">1.2k followers<br />Radio Jockey</div>
                                </div>
                                <div class="col-6 align-items-center mx-auto mt-4">
                                    <button class="btn btn-sm rounded rj-follow-btn">Follow</button>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card rj-card shadow row m-0 p-0">
                                <div class="col-6">
                                    <img src="{{ asset('images/rj-card/rj_chandani.png') }}" class="img-fluid w-100s" />
                                    <h6 class="text-primary mb-0">Rj Chandani</h6>
                                    <div class="text-secondary rj-details fs-6 mt-2">10.6k followers<br />Radio Jockey</div>
                                </div>
                                <div class="col-6 align-items-center mx-auto mt-4">
                                    <button class="btn btn-sm rounded rj-follow-btn">Follow</button>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card rj-card shadow row m-0 p-0">
                                <div class="col-6">
                                    <img src="{{ asset('images/rj-card/rj_surin.png') }}" class="img-fluid w-100s" />
                                    <h6 class="text-primary mb-0">Rj Surin</h6>
                                    <div class="text-secondary rj-details fs-6 mt-2">1k followers<br />Radio Jockey</div>
                                </div>
                                <div class="col-6 align-items-center mx-auto mt-4">
                                    <button class="btn btn-sm rounded rj-follow-btn">Follow</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    {{-- <div class="swiper-pagination"></div> --}}

                    <!-- If we need navigation buttons -->
                    {{-- <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div> --}}

                    <!-- If we need scrollbar -->
                    {{-- <div class="swiper-scrollbar"></div> --}}
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
    <script>

        // const audioContext = new AudioContext();
        // const audioElement = document.getElementById('audio');
        // const track = audioContext.createMediaElementSource(audioElement);
        // const pannerOptions = { pan: 0 };
        // const panner = new StereoPannerNode(audioCtx, pannerOptions);
        // track.connect(audioContext.destination);

        var audioPlayer = document.getElementById("audioPlayer");
        var playButton = document.getElementById("playButton");

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
            } else {
                // Otherwise, mute it
                audioPlayer.volume = 0;
            }
            updateVolumeText(audioPlayer.volume);
        });

        // Function to update the volume text based on the current volume level
        function updateVolumeText(volume) {
            if (volume === 0) {
                muteButton.html(`<i class="bi bi-volume-up"></i>`);
            } else {
                // muteButton.textContent = "Mute";
                muteButton.html(`<i class="bi bi-volume-mute"></i>`);
            }
        }



        audioPlayer.volume = 1.0;



        // Set the initial source URL for the audio
        audioPlayer.src = "https://a1.asurahosting.com:8030/radio.mp3";

        // Add a click event listener to the play button
        playButton.addEventListener("click", function() {
            if (audioPlayer.paused) {
                audioPlayer.play();
                // playButton.textContent = "Pause";
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
                audioPlayer.pause();
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
        });


        $(document).on('click','.opiton-btn-1',function(){
            $('.dropdown-menu').toggleClass('show');
        });

        $('.mute-audio-1').click(function(){
            $('#muteButton').click();
            let txt = $('.mute-audio-1').html();
            if(txt == 'Mute'){
                $('.mute-audio-1').html('unmute');
            }else{
                $('.mute-audio-1').html('Mute');
            }
        });

        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
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
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
            },
        });

        var swiper = new Swiper(".mySwiper1", {
            slidesPerView: 1,
            spaceBetween: 200,
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
                    slidesPerView: 2,
                    spaceBetween: 20,
                }
            },
        });
    </script>
@endsection
