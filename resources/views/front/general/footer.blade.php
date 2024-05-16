

<footer class="rounded d-flex mt-auto ">
    <div class="container row align-items-center mx-auto">
        <div class="col-md-4 align-items-center text-start">
            <div class="mb-4"><h5>Quick Links</h5></div>
            <ul class="ps-0">
                <a href="{{ route('contact-us') }}" class="text-white"><li class="pb-2">CONTACT US</li></a>
                <a href="{{ route('about-us') }}" class="text-white"><li class="pb-2">ABOUT US</li></a>
                <a href="{{ route('careers') }}" class="text-white"><li class="pb-2">CAREERS</li></a>
                <a href="{{ route('advertise') }}" class="text-white"><li class="pb-2">ADVERTISE WITH US</li></a>
                <a href="{{ route('privacy-policy') }}" class="text-white"><li class="pb-2">PRIVACY POLICY</li></a>
                <a href="{{ route('terms-and-conditions') }}" class="text-white"><li class="pb-2">TERMS & CONDITIONS</li></a>
            </ul>
        </div>

        <div class="col-md-4 col-sm-6 footer-social">
            <div class="text-center footer-social-heading">
                <div class="p-0 m-0 text-white">
                    <h6>Stay Connected</h6>
                </div>
                <span class="d-inline">
                    <a href="https://www.instagram.com/89.6_radio.rajkot/" target="_blank" class="mx-2"><img src="{{ asset('images/icons/social/instagram.png') }}" class="img-fluid social-icons"/></a>
                    <a href="https://twitter.com/RajkotRadio" target="_blank" class="mx-2"><img src="{{ asset('images/icons/social/twitter.png') }}" class="img-fluid social-icons"/></a>
                    <a href="https://www.facebook.com/89.6RadioRajkot" target="_blank" class="mx-2"><img src="{{ asset('images/icons/social/facebook.png') }}" class="img-fluid social-icons"/></a>
                    <a href="https://www.youtube.com/@RADIORAJKOT" target="_blank" class="mx-2"><img src="{{ asset('images/icons/social/youtube.png') }}" class="img-fluid social-icons"/></a>
                </span>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 footer-address">
            <div class="footer-address-1">
                <div class="pt-0 mt-0 text-white"><h5>Address</h5></div>
                <span class="d-inline">
                    <p class="text-white footer-address-1">1009, Aalap B Complex,<br/>Opp Shashtri Maidan,<br/>Near Limda Chowk,<br/>Rajkot, India, Gujarat</p>
                    {{-- <div class="text-white text-center" style="justify-content: flex-start;">
                        1009, Aalap B Complex,Opp<br/>
                    Shashtri Maidan,Near<br/>
                    Limda Chowk<br/>
                    Rajkot-360001<br/>
                    <br/>
                    </div> --}}

                    {{-- <img src="{{ asset('images/icons/social/asana.png') }}" class="img-fluid social-icons"/>
                    <img src="{{ asset('images/icons/social/behance.png') }}" class="img-fluid social-icons"/>
                    <img src="{{ asset('images/icons/social/google.png') }}" class="img-fluid social-icons"/> --}}
                </span>

            </div>
        </div>
        <div class="col-12">
            <div class="text-center">
                <p class="text-white">© Copyright {{ date('Y') }}, Radio Rajkot  All rights reserved.</p>
            </div>
        </div>
    </div>

</footer>
</div>
</div>
</div>





