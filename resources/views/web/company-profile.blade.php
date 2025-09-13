@extends('web.layouts.app')
@section('title', 'About Us')
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
                        <h1>Company Profile</h1>
                        <ul>
                            <li><a href="#"><i class="fal fa-home-lg"></i> Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Company Profile</a></li>
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


<!--============================
    COMPANY PROFILE START
=============================-->
<section class="blog_details blog_2 mt_75 mb_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 wow fadeInUp">
                <div class="blog_details_left">

                    <div class="blog_details_img_1">
                        <img src="assets/images/blog_details_1_img.jpg" alt="Company" class="img-fluid w-100">
                    </div>

                    <ul class="blog_details_top d-flex flex-wrap">
                        <li>
                            <span><img src="assets/images/calender.png" alt="icon" class="img-fluid w-100"></span>
                            Established 2010
                        </li>
                        <li>
                            <span><img src="assets/images/user_icon_black.svg" alt="icon" class="img-fluid w-100"></span>
                            By Meditech Importers
                        </li>
                    </ul>

                    <h2>Meditech Importers – Advancing Healthcare with Quality Medical Equipment</h2>
                    <p>Founded in 2010, Meditech Importers has been a trusted partner for hospitals, clinics, and healthcare institutions across Bangladesh. Our mission is to provide <strong>high-quality, reliable, and innovative medical equipment</strong> that empowers healthcare providers to deliver the best care to their patients.</p>

                    <h4>Our Specializations</h4>
                    <ul class="blog_explaine">
                        <li>Diagnostic Equipment: X-ray machines, ultrasound systems, ECG monitors, laboratory analyzers.</li>
                        <li>Therapeutic Equipment: Ventilators, infusion pumps, physiotherapy devices.</li>
                        <li>Surgical Instruments: Scalpels, forceps, anesthesia machines, and more.</li>
                        <li>Hospital Furniture & Accessories: Beds, trolleys, sterilization units.</li>
                        <li>Consumables & Supplies: Gloves, masks, syringes, testing kits.</li>
                    </ul>

                    <h4>Why Choose Meditech Importers?</h4>
                    <p>All our products comply with <strong>ISO standards and local regulatory requirements</strong>, ensuring safety, durability, and performance. Over the years, we have partnered with leading hospitals, clinics, and NGOs, delivering customized solutions that meet the unique needs of each client.</p>

                    <div class="blog_details_review">
                        <p>"At Meditech Importers, we pride ourselves on professionalism, reliability, and after-sales support. From consultation and installation to maintenance and training, our team supports healthcare providers at every step."</p>
                    </div>

                    <h4>Our Commitment</h4>
                    <p>We are more than just suppliers – we are <strong>partners in advancing healthcare</strong>. Contact us today to discuss your requirements and discover how we can help enhance patient care in your facility.</p>

                    <div class="row mt_20">
                        <div class="col-sm-6">
                            <div class="blog_details_center_img">
                                <img src="assets/images/blog_details_2_img.jpg" alt="Equipment" class="img-fluid w-100">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="blog_details_center_img">
                                <img src="assets/images/blog_details_3_img.jpg" alt="Team" class="img-fluid w-100">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-8 wow fadeInRight">
                <div id="sticky_sidebar">
                    <div class="blog_details_right">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><i class="far fa-search" aria-hidden="true"></i></button>
                        </form>

                        <div class="blog_details_right_header sidebar_blog">
                            <h3>Popular Equipment</h3>
                            <div class="popular_blog d-flex flex-wrap">
                                <div class="popular_blog_img">
                                    <img src="assets/images/blog_img_1.png" alt="img" class="img-fluid w-100">
                                </div>
                                <div class="popular_blog_text">
                                    <p>Diagnostic Tools</p>
                                    <a class="title" href="#">X-rays, Ultrasound, ECG Machines</a>
                                </div>
                            </div>
                            <div class="popular_blog d-flex flex-wrap">
                                <div class="popular_blog_img">
                                    <img src="assets/images/blog_img_2.png" alt="img" class="img-fluid w-100">
                                </div>
                                <div class="popular_blog_text">
                                    <p>Therapeutic Devices</p>
                                    <a class="title" href="#">Ventilators, Infusion Pumps</a>
                                </div>
                            </div>
                        </div>

                        <div class="blog_details_right_header">
                            <h3>Tags</h3>
                            <ul class="blog_details_tag d-flex flex-wrap">
                                <li><a href="#">Medical</a></li>
                                <li><a href="#">Equipment</a></li>
                                <li><a href="#">Healthcare</a></li>
                                <li><a href="#">Supplies</a></li>
                                <li><a href="#">Surgical</a></li>
                            </ul>
                        </div>

                        <div class="blog_details_right_header">
                            <div class="blog_seidebar_add">
                                <img src="assets/images/blog_sidebar_add_img.png" alt="blog add" class="img-fluid w-100">
                                <div class="text">
                                    <h4>Enhance Patient Care with Meditech</h4>
                                    <a class="common_btn" href="#" tabindex="-1">Contact Us <i class="fas fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--============================
    COMPANY PROFILE END
=============================-->


@endsection