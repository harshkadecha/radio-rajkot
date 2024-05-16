@extends('front.layouts.main')

@section('title')
    Radio Rajkot | {!! $blog->title !!}
@endsection
@section('description')
    {!! $blog->title !!}
@endsection

@section('meta')
    <meta name="keywords" content="fm, 89.6, 89.6 FM, radio rajkot, Radio Rajkot ,{{ $blog->category }}" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
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
    <link rel="stylesheet" href="{{ asset('front-assets/css/custome.css?v=') . time() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
@endsection

@section('content')
    <div class="row static-content">
        <div class="col-sm-12 col-md-7 col-lg-10 col-xl-8">
            <div class="blog-heading py-4 text-left d-block">
                <h3>{!! $blog->title !!}</h3>
            </div>

            <div class="blog-img d-flex align-items-start">
                <img src="{{ asset('storage/blog') . '/' . $blog->images }}" class="img-fluid me-auto my-4">
            </div>

            {!! $blog->description !!}
            <a class="is-helpful" href="javascript:void(0)" style="text-decoration: none; color: #000 ; width: 180px">
                <img src="{{ asset('images/icons/thumb-up.png') }}" />
                <span class="ms-4">is helpful?</span>
            </a>

            <div class="col-md-12">
                <div class="commnet-form">
                    <h4>Write Review..</h4>
                    <form id="commentForm">
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control exampleInputEmail1" id="name"
                                placeholder="Your Name">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control exampleInputEmail1" name="comment" id="comment" placeholder="comment here.."
                                rows="5"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary submit">Submit</button>
                    </form>
                </div>
                <div class="commnet-form user-comments my-4 d-none">
                    <div class="my-2 mb-4">
                        <h4>Comments</h4>
                    </div>
                    <div class="comment-box d-flex my-2">
                        <div class="user-icon me-2">
                            <img src="{{ asset('/images/avatars/default.png') }}" class="img-fluid user-icon-1">
                        </div>
                        <div class="comment">
                            <h6>Lorem, ipsum.</h6>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde est fuga animi laborum ad omnis
                            dolor amet laudantium nisi quam!
                        </div>
                    </div>
                    <div class="comment-box d-flex my-2">
                        <div class="user-icon me-2">
                            <img src="{{ asset('/images/avatars/default.png') }}" class="img-fluid user-icon-1">
                        </div>
                        <div class="comment">
                            <h6>Lorem, ipsum.</h6>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde est fuga animi laborum ad omnis
                            dolor amet laudantium nisi quam!
                        </div>
                    </div>
                </div>
                @if (sizeof($comments) > 0)
                    <div class="commnet-form user-comments my-4">
                        <div class="my-2 mb-4">
                            <h4>Comments</h4>
                        </div>
                        @foreach ($comments as $comment)
                            @if ($comment->is_verified == 1)
                                <div class="comment-box d-flex my-2 row">
                                    <div class="user-icon col-3 col-md-1 col-sm-2">
                                        <img src="{{ asset('/images/avatars/default.png') }}" class="img-fluid user-icon-1">
                                    </div>
                                    <div class="comment col-8 col-md-10 col-sm-10">
                                        <h6>{{ $comment->name }}</h6>
                                        {!! $comment->comment !!}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="col-sm-12 col-md-5 col-lg-2 col-xl-4">
            <div class="trending-reads">
                <h4 class="text-secondary">Trending Reads</h4>
                <div class="trending-reads-items pt-4">
                    @php
                        $trending_reads = App\Models\Blog::where('category', '=', 'trending_reads')
                            ->latest()
                            ->take(10)
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
                                    <p class="mb-2">{{ Str::substr($blog->title, 0, 60) . '....' }}</p>
                                </a>
                                <img src="{{ asset('images/logo/radio_rajkot.png') }}" class="profile-user blog-author-img"
                                    style="max-width: 30px;border-radius: 100%;" />
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
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>s
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    {{-- <script src="./slide-stories.js"></script> --}}
    <script src="{{ asset('slider/slide-stories.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script>
        $('.is-helpful').click(function() {
            $(this).toggleClass('is-helpful-active');
        });
        $('iframe').addClass('video-container');

        $(document).ready(function() {
            $('.submit').click(function(e) {

                if ($("#commentForm").valid() == true) {

                    let name = $('#name').val();
                    let comment = $('#comment').val();
                    let token = "{{ csrf_token() }}";
                    let blog_id = "{{ $blog_id }}";

                    var url = "{{ route('add_comment') }}";
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            "_token": token,
                            "blog_id": blog_id,
                            "name" : name,
                            "comment" : comment
                        },
                        success: function(response) {

                            if (response.status) {
                                toastr.success(
                                    response.message
                                );
                            } else {
                                toastr.error(
                                    response.message
                                );
                            }
                            $('#commentForm')[0].reset();
                        },
                        error: function(xhr, ajaxOptions, thrownError) {

                        }
                    });
                }
            });
            // this is for validation and message
            $("#commentForm").validate({
                errorClass: 'is-invalid',
                rules: {
                    name: "required",
                    comment: "required",
                },
                messages: {
                    name: {
                        required: "Name is Required",
                    },
                    comment: {
                        required: "comment is Required"
                    },
                },
            });
        });

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


        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false
            },
            // pagination: {
            //     el: ".swiper-pagination",
            //     clickable: true,
            // },
            breakpoints: {
                480: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20,
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
                    slidesPerView: 2,
                    spaceBetween: 20,
                }
            },
        });



        //         window.setInterval(function(){ // Set interval for checking
        //     var date = new Date(); // Create a Date object to find out what time it is
        //     if(date.getHours() === 8 && date.getMinutes() === 0){ // Check the time
        //         // Do stuff
        //     }
        // }, 60000); // Repeat every 60000 milliseconds (1 minute)
    </script>
@endsection
