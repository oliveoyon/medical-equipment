@extends('web.layouts.app')
@section('title', 'Why Choose Us')

@section('content')

<!--=========================
    PAGE BANNER START
==========================-->
<section class="page_banner" style="background: url(assets/images/page_banner_bg.jpg);">
    <div class="page_banner_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page_banner_text wow fadeInUp">
                        <h1>Why Choose Us</h1>
                        <ul>
                            <li><a href="#"><i class="fal fa-home-lg"></i> Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Why Choose Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=========================
    PAGE BANNER END
==========================-->


<!--=========================
    WHY CHOOSE US START
==========================-->
<section class="why_choose_us mt_75 mb_100">
    <div class="container">
        <div class="row justify-content-center text-center wow fadeInUp">
            <div class="col-lg-8">
                <div class="section_title">
                    <h2>Why Choose Meditech Importers?</h2>
                    <p>We stand out for our commitment to quality, compliance, innovation, and exceptional customer service.</p>
                </div>
            </div>
        </div>

        <div class="row mt_50">
            <div class="col-md-4 mb-4 wow fadeInUp">
                <div class="choose_us_card text-center p-4 border rounded shadow-sm h-100">
                    <img src="https://placehold.co/100x100?text=Quality" alt="Quality" class="mb-3">
                    <h5>Premium Quality</h5>
                    <p>All our products meet international quality standards, ensuring reliability and safety.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="choose_us_card text-center p-4 border rounded shadow-sm h-100">
                    <img src="https://placehold.co/100x100?text=Compliance" alt="Compliance" class="mb-3">
                    <h5>Certified Compliance</h5>
                    <p>ISO, CE, FDA, and local certifications ensure all products are fully compliant and trustworthy.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="choose_us_card text-center p-4 border rounded shadow-sm h-100">
                    <img src="https://placehold.co/100x100?text=Support" alt="Support" class="mb-3">
                    <h5>Expert Support</h5>
                    <p>Our team provides guidance, installation, and maintenance to guarantee smooth operations.</p>
                </div>
            </div>
        </div>
    </div>
</section> 
<!--=========================
    WHY CHOOSE US END
==========================-->

@endsection
