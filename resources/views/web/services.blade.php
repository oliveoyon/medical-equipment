 @extends('web.layouts.app1')
@section('title', 'After Sales Support')
@section('page-title', 'After Sales Support')

@section('content')

    <!-- Hero Section -->
    <section class="after_sales_hero mt_50 mb_50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Comprehensive After Sales Support</h1>
                    <p>We offer a wide range of after-sales services for our medical equipment to ensure optimal
                        performance, reliability, and longevity. Our team is committed to providing fast, professional, and
                        cost-effective support.</p>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="assets/images/vendor_img_1.jpg" alt="After Sales Support" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="vendor_page mt_75 mb_100">
    <div class="container">
        <div class="row">

            <div class="col-xxl-3 col-md-6 col-lg-4  wow fadeInUp">
                <div class="single_vendor">
                    <div class="img">
                        <img src="assets/images/vendor_img_1.jpg" alt="Vendor" class="img-fluid w-100">
                    </div>
                    <div class="text">
                        <a class="title" href="vendor_details.html">Medical Equipment Sales</a>

                        <p class="info">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                            37 W 24th St, New York, NY
                        </p>
                        <a class="info" href="callto:12345678901">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 3.75v4.5m0-4.5h-4.5m4.5 0-6 6m3 12c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 0 1 4.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 0 0-.38 1.21 12.035 12.035 0 0 0 7.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 0 1 1.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 0 1-2.25 2.25h-2.25Z" />
                            </svg>
                            +965 2541 552 55555
                        </a>
                        <a class="info" href="mailto:example@gmail.com">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
                            </svg>
                            example@gmail.com
                        </a>
                        <a class="common_btn" href="vendor_details.html">See Details</a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-6 col-lg-4  wow fadeInUp">
                <div class="single_vendor">
                    <div class="img">
                        <img src="assets/images/vendor_img_2.jpg" alt="Vendor" class="img-fluid w-100">
                    </div>
                    <div class="text">
                        <a class="title" href="vendor_details.html">Equipment Installation & Setup</a>
                        <p class="info">... same contact info ...</p>
                        <a class="common_btn" href="vendor_details.html">See Details</a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-6 col-lg-4  wow fadeInUp">
                <div class="single_vendor">
                    <div class="img">
                        <img src="assets/images/vendor_img_3.jpg" alt="Vendor" class="img-fluid w-100">
                    </div>
                    <div class="text">
                        <a class="title" href="vendor_details.html">User Training & Orientation</a>
                        <p class="info">... same contact info ...</p>
                        <a class="common_btn" href="vendor_details.html">See Details</a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-6 col-lg-4  wow fadeInUp">
                <div class="single_vendor">
                    <div class="img">
                        <img src="assets/images/vendor_img_4.jpg" alt="Vendor" class="img-fluid w-100">
                    </div>
                    <div class="text">
                        <a class="title" href="vendor_details.html">Preventive Maintenance Services</a>
                        <p class="info">... same contact info ...</p>
                        <a class="common_btn" href="vendor_details.html">See Details</a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-6 col-lg-4  wow fadeInUp">
                <div class="single_vendor">
                    <div class="img">
                        <img src="assets/images/vendor_img_6.jpg" alt="Vendor" class="img-fluid w-100">
                    </div>
                    <div class="text">
                        <a class="title" href="vendor_details.html">Repair & Technical Support</a>
                        <p class="info">... same contact info ...</p>
                        <a class="common_btn" href="vendor_details.html">See Details</a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-6 col-lg-4  wow fadeInUp">
                <div class="single_vendor">
                    <div class="img">
                        <img src="assets/images/vendor_img_1.jpg" alt="Vendor" class="img-fluid w-100">
                    </div>
                    <div class="text">
                        <a class="title" href="vendor_details.html">Calibration Services</a>
                        <p class="info">... same contact info ...</p>
                        <a class="common_btn" href="vendor_details.html">See Details</a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-6 col-lg-4  wow fadeInUp">
                <div class="single_vendor">
                    <div class="img">
                        <img src="assets/images/vendor_img_2.jpg" alt="Vendor" class="img-fluid w-100">
                    </div>
                    <div class="text">
                        <a class="title" href="vendor_details.html">Supply of Consumables</a>
                        <p class="info">... same contact info ...</p>
                        <a class="common_btn" href="vendor_details.html">See Details</a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-6 col-lg-4  wow fadeInUp">
                <div class="single_vendor">
                    <div class="img">
                        <img src="assets/images/vendor_img_3.jpg" alt="Vendor" class="img-fluid w-100">
                    </div>
                    <div class="text">
                        <a class="title" href="vendor_details.html">Warranty & Support</a>
                        <p class="info">... same contact info ...</p>
                        <a class="common_btn" href="vendor_details.html">See Details</a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-6 col-lg-4  wow fadeInUp">
                <div class="single_vendor">
                    <div class="img">
                        <img src="assets/images/vendor_img_4.jpg" alt="Vendor" class="img-fluid w-100">
                    </div>
                    <div class="text">
                        <a class="title" href="vendor_details.html">Emergency Support Services</a>
                        <p class="info">... same contact info ...</p>
                        <a class="common_btn" href="vendor_details.html">See Details</a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-6 col-lg-4  wow fadeInUp">
                <div class="single_vendor">
                    <div class="img">
                        <img src="assets/images/vendor_img_6.jpg" alt="Vendor" class="img-fluid w-100">
                    </div>
                    <div class="text">
                        <a class="title" href="vendor_details.html">Equipment Relocation</a>
                        <p class="info">... same contact info ...</p>
                        <a class="common_btn" href="vendor_details.html">See Details</a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-6 col-lg-4  wow fadeInUp">
                <div class="single_vendor">
                    <div class="img">
                        <img src="assets/images/vendor_img_1.jpg" alt="Vendor" class="img-fluid w-100">
                    </div>
                    <div class="text">
                        <a class="title" href="vendor_details.html">Consultation Services</a>
                        <p class="info">... same contact info ...</p>
                        <a class="common_btn" href="vendor_details.html">See Details</a>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-6 col-lg-4  wow fadeInUp">
                <div class="single_vendor">
                    <div class="img">
                        <img src="assets/images/vendor_img_2.jpg" alt="Vendor" class="img-fluid w-100">
                    </div>
                    <div class="text">
                        <a class="title" href="vendor_details.html">Software Integration Services</a>
                        <p class="info">... same contact info ...</p>
                        <a class="common_btn" href="vendor_details.html">See Details</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


    <section class="features mt_20" style="background: #edfcea">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 wow fadeInUp mb_20">
                    <div class="features_item purple">
                        <div class="icon">
                            <img src="assets/images/feature-icon_1.svg" alt="feature">
                        </div>
                        <div class="text">
                            <h3>Return & Refund</h3>
                            <p>Money-back guarantee</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 wow fadeInUp">
                    <div class="features_item green">
                        <div class="icon">
                            <img src="assets/images/feature-icon_3.svg" alt="feature">
                        </div>
                        <div class="text">
                            <h3>24/7 Support</h3>
                            <p>Always available online</p>
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
                            <p>Trusted & safe checkout</p>
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
                            <p>Special discounts on selected items</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
