<footer class="footer_2 pt_100" style="background: url({{ asset('assets/images/footer_2_bg_2.jpg') }});">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-3 col-md-6 col-lg-3 wow fadeInUp" data-wow-delay=".7s">
                <div class="footer_2_logo_area">
                    <a class="footer_logo" href="{{ route('web.home') }}">
                        @if ($generalSetting && $generalSetting->logo)
                            <img src="{{ asset('storage/' . $generalSetting->logo) }}"
                                alt="{{ $generalSetting->company_name }}" class="img-fluid w-100">
                        @endif
                    </a>

                    <p>Silmimeditech is a leading medical technology company dedicated to providing innovative
                        healthcare solutions, high-quality medical equipment, and exceptional support to improve patient
                        care and hospital efficiency.</p>
                    <ul>
                        <li><span>Follow :</span></li>
                        @if ($generalSetting->facebook)
                            <li>
                                <a href="{{ $generalSetting->facebook }}" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                        @endif

                        @if ($generalSetting->twitter)
                            <li>
                                <a href="{{ $generalSetting->twitter }}" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                        @endif

                        @if ($generalSetting->instagram)
                            <li>
                                <a href="{{ $generalSetting->instagram }}" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        @endif

                        @if ($generalSetting->linkedin)
                            <li>
                                <a href="{{ $generalSetting->linkedin }}" target="_blank" rel="noopener noreferrer">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        @endif
                    </ul>

                </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-md-4 col-lg-2 wow fadeInUp" data-wow-delay="1s">
                <div class="footer_link">
                    <h3>Company</h3>
                    <ul>
                        <li><a href="{{ route('web.about') }}">About Us</a></li>
                        <li><a href="{{ route('web.profile') }}">Company Profile</a></li>
                        <li><a href="{{ route('web.certification') }}">Certifications & Compliance</a></li>
                        <li><a href="{{ route('web.whyChose') }}">Why Choose Us</a></li>
                        <li><a href="{{ route('web.partners') }}">Partners & Clients</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-md-4 col-lg-2 wow fadeInUp" data-wow-delay="1.3s">
                <div class="footer_link">
                    <h3>Category</h3>
                    <ul>
                        @php
                            $randomCategories = $headerCategories->shuffle()->take(5);
                        @endphp

                        @foreach ($randomCategories as $cat)
                            <li><a href="diagnostic_equipment.html">{{ $cat->name }}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-md-4 col-lg-2 wow fadeInUp" data-wow-delay="1.6s">
                <div class="footer_link">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Privacy Ploicy</a></li>
                        <li><a href="#">Terms and Condition</a></li>
                        <li><a href="#">Return Policy</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Become a Vendor</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-md-4 col-lg-3 wow fadeInUp" data-wow-delay="1.9s">
                <div class="footer_link footer_logo_area">
                    <h3>Contact Us</h3>
                    <p>Contact us for reliable solutions, expert guidance, and outstanding service for all your needs.
                    </p>
                    <span>
                        <b><img src="{{ asset('assets/images/location_icon_white.png') }}" alt="Map" class="img-fluid"></b>
                        {{ $generalSetting->address }}</span>
                    <span>
                        <b><img src="{{ asset('assets/images/phone_icon_white.png') }}" alt="Call" class="img-fluid"></b>
                        <a href="callto:+123324587939">{{ $generalSetting->phone }}</a>
                    </span>
                    <span>
                        <b><img src="{{ asset('assets/images/mail_icon_white.png') }}" alt="Mail" class="img-fluid"></b>
                        <a href="mailto:support@mail.com">{{ $generalSetting->email }}</a>
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="footer_copyright mt_75">
                    <p>Copyright @ <b>Silmimeditech</b> 2025. All right reserved.</p>
                    <ul class="payment">
                        <li>Payment by :</li>
                        <li>
                            <img src="{{ asset('assets/images/footer_payment_icon_1.jpg') }}" alt="payment" class="img-fluid w-100">
                        </li>
                        <li>
                            <img src="{{ asset('assets/images/footer_payment_icon_2.jpg') }}" alt="payment" class="img-fluid w-100">
                        </li>
                        <li>
                            <img src="{{ asset('assets/images/footer_payment_icon_3.jpg') }}" alt="payment" class="img-fluid w-100">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

<!-- JS Files -->
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/Font-Awesome.js') }}"></script>
<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.countup.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/simplyCountdown.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/venobox.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.marquee.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.pwstabs.min.js') }}"></script>
<script src="{{ asset('assets/js/scroll_button.js') }}"></script>
<script src="{{ asset('assets/js/jquery.youtube-background.min.js') }}"></script>
<script src="{{ asset('assets/js/range_slider.js') }}"></script>
<script src="{{ asset('assets/js/sticky_sidebar.js') }}"></script>
<script src="{{ asset('assets/js/multiple-image-video.js') }}"></script>
<script src="{{ asset('assets/js/animated_barfiller.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
@stack('scripts')

</body>
</html>
