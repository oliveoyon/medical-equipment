@extends('web.layouts.app1')
@section('title', 'Why Choose Us')
@section('content')

<!-- Why Choose Us Intro -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold">Why Choose Us</h2>
                <p class="text-muted">
                    Choosing the right partner makes all the difference. We combine innovation, reliability, 
                    and a client-focused approach to deliver solutions that help you grow with confidence.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="about_choose pt_100 pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-7">
                    <div class="about_choose_text">
                        <div class="row">
                            <div class="col-12">
                                <div class="section_heading_2 section_heading mb_15">
                                    <h3>Why we are the <span>best</span></h3>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 wow fadeInUp">
                                <div class="about_choose_text_box">
                                    <span><i class="fal fa-tshirt"></i></span>
                                    <h4>quality products</h4>
                                    <p>Objectively pontificate quality models before intuitive information.</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 wow fadeInUp">
                                <div class="about_choose_text_box">
                                    <span><i class="fal fa-truck"></i></span>
                                    <h4>Fast Delivery</h4>
                                    <p>Objectively pontificate quality models before intuitive information.</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 wow fadeInUp">
                                <div class="about_choose_text_box">
                                    <span><i class="far fa-undo-alt"></i></span>
                                    <h4>return policy</h4>
                                    <p>Objectively pontificate quality models before intuitive information.</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 wow fadeInUp">
                                <div class="about_choose_text_box">
                                    <span><i class="fas fa-headset"></i></span>
                                    <h4>24/7 Service</h4>
                                    <p>Objectively pontificate quality models before intuitive information.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-lg-5 wow fadeInRight" data-wow-duration="1s"
                    style="visibility: visible; animation-duration: 1s; animation-name: fadeInRight;">
                    <div class="about_choose_img">
                        <img src="assets/images/why_choose_img.jpg" alt="about us" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- Our Strengths -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <h4 class="fw-bold">Proven Expertise</h4>
                <p class="text-muted">
                    With years of experience, we bring deep knowledge and proven methodologies 
                    that ensure every project is executed with precision.
                </p>
            </div>
            <div class="col-md-4 mb-4">
                <h4 class="fw-bold">Client-Centric Approach</h4>
                <p class="text-muted">
                    Your goals are our priority. We listen, understand, and tailor solutions 
                    that align with your unique needs and long-term vision.
                </p>
            </div>
            <div class="col-md-4 mb-4">
                <h4 class="fw-bold">Commitment to Quality</h4>
                <p class="text-muted">
                    From planning to execution, we maintain high standards and deliver outcomes 
                    that exceed expectations every single time.
                </p>
            </div>
        </div>
    </div>
</section>



<!-- Our Promise -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h3 class="fw-bold">Our Promise</h3>
                <p class="text-muted">
                    We promise transparency, dedication, and continuous improvement. 
                    Our team works hand-in-hand with clients to ensure trust and measurable success.
                </p>
            </div>
        </div>
    </div>
</section>

<!--============================
        FEATURES START
    ==============================-->
    <section class="features mt_20" style="background: #edfcea">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 wow fadeInUp mb_20">
                    <div class="features_item purple">
                        <div class="icon">
                            <img src="assets/images/feature-icon_1.svg" alt="feature">
                        </div>
                        <div class="text">
                            <h3>Return & refund</h3>
                            <p>Money back guarantee</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 wow fadeInUp">
                    <div class="features_item green">
                        <div class="icon">
                            <img src="assets/images/feature-icon_3.svg" alt="feature">
                        </div>
                        <div class="text">
                            <h3>Quality Support</h3>
                            <p>Always online 24/7</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 wow fadeInUp">
                    <div class="features_item orange">
                        <div class="icon">
                            <img src="assets/images/feature-icon_2.svg" alt="feature">
                        </div>
                        <div class="text">
                            <h3>Secure Payment</h3>
                            <p>30% off by subscribing</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 wow fadeInUp">
                    <div class="features_item">
                        <div class="icon">
                            <img src="assets/images/feature-icon_4.svg" alt="feature">
                        </div>
                        <div class="text">
                            <h3>Daily Offers</h3>
                            <p>20% off by subscribing</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        FEATURES END
    ==============================-->

@endsection
