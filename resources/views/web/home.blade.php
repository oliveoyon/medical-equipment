@extends('web.layouts.app')

@section('title', 'Products')

@section('content')

    <style>
        .shadow-box {
            background: #f9fafc;
            /* very light professional background */
            border: 1px solid #e0e3e8;
            /* subtle border */
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            /* light shadow */
            margin-bottom: 25px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            align-items: flex-start;
            /* top aligned */
        }

        .shadow-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .gadget_feature_product_item .text h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #1f2937;
            /* dark professional text color */
        }

        .gadget_feature_product_item .buy_btn {
            font-size: 14px;
            font-weight: 500;
            color: #3b82f6;
            /* professional accent color */
            text-transform: uppercase;
            transition: color 0.3s ease;
        }

        .gadget_feature_product_item .buy_btn:hover {
            color: #1e40af;
        }

        .gadget_feature_product_item .img {
            flex-shrink: 0;
            max-width: 40%;
            display: flex;
            justify-content: flex-end;
        }

        .gadget_feature_product_item .img img.product-img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            object-fit: contain;
        }

        /* Responsive: image below text on small screens */
        @media (max-width: 767px) {
            .gadget_feature_product_item {
                flex-direction: column;
            }

            .gadget_feature_product_item .img {
                max-width: 100%;
                justify-content: center;
                margin-top: 10px;
            }
        }
    </style>


    <section class="gadget_feature_product mt_55">
        <div class="container">
            <div class="row">
                @foreach ($products->random(3) as $product)
                    <div class="col-xl-4 col-md-6 wow fadeInUp">
                        <div class="gadget_feature_product_item d-flex shadow-box">
                            <!-- Left: Text -->
                            <div class="text flex-grow-1 pe-3">
                                <h3>{{ $product->name }}</h3>
                                <a class="buy_btn" href="{{ route('web.detail', $product->slug) }}">
                                    Details <i class="far fa-arrow-up"></i>
                                </a>
                            </div>
                            <!-- Right: Image -->
                            <div class="img ms-auto d-flex align-items-center">
                                @if ($product->images->isNotEmpty())
                                    <img src="{{ asset('storage/' . $product->images->first()->image) }}"
                                        alt="{{ $product->name }}" class="product-img img-fluid">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}" alt="No Image Available"
                                        class="product-img img-fluid">
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
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
    <!--============================
                                                    FEATURES END
                                                ==============================-->

    <!--=========================
                                                    ABOUT US PAGE START
                                                ==========================-->
    <section class="about_us mt_100">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-xxl-5 col-md-10 col-lg-6 wow fadeInLeft">
                    <div class="about_us_img">
                        <div class="img">
                            <img src="assets/images/about_img.jpg" alt="about us" class="img-fluid w-100">
                        </div>
                        <h3>12+ <span>Years Experience</span></h3>
                        <p>Silmimeditechbd has been delivering quality medical equipment for over a decade.
                            <span>Our team</span>
                        </p>
                    </div>
                </div>
                <div class="col-xxl-6 col-lg-6 wow fadeInRight">
                    <div class="about_us_text">
                        <h6>About Company</h6>
                        <h2>Reliable Medical Equipment Importer</h2>
                        <p class="description">We provide hospitals, clinics, and healthcare providers with cutting-edge
                            medical devices, ensuring reliability, quality, and performance.</p>
                        <ul>
                            <li>
                                <h4>Trusted Partner</h4>
                                <p>We have built long-term relationships with healthcare institutions across Bangladesh.</p>
                            </li>
                            <li>
                                <h4>Quality Products</h4>
                                <p>We import only certified medical devices from leading manufacturers worldwide.</p>
                            </li>
                            <li>
                                <h4>Fast Delivery</h4>
                                <p>We ensure timely delivery to all healthcare providers in Bangladesh.</p>
                            </li>
                            <li>
                                <h4>Secure Payment</h4>
                                <p>Our transactions are safe, transparent, and hassle-free.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about_choose mt_95 pt_100 pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-7">
                    <div class="about_choose_text">
                        <div class="row">
                            <div class="col-12">
                                <div class="section_heading_2 section_heading mb_15">
                                    <h3>Why We Are the <span>Best</span></h3>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 wow fadeInUp">
                                <div class="about_choose_text_box">
                                    <span><i class="fas fa-stethoscope"></i></span>
                                    <h4>Quality Products</h4>
                                    <p>All medical equipment meets international standards and certifications.</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 wow fadeInUp">
                                <div class="about_choose_text_box">
                                    <span><i class="fas fa-shipping-fast"></i></span>
                                    <h4>Fast Delivery</h4>
                                    <p>Prompt delivery ensures your facility never runs out of essential equipment.</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 wow fadeInUp">
                                <div class="about_choose_text_box">
                                    <span><i class="fas fa-undo-alt"></i></span>
                                    <h4>Return Policy</h4>
                                    <p>Hassle-free returns for damaged or defective products.</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 wow fadeInUp">
                                <div class="about_choose_text_box">
                                    <span><i class="fas fa-headset"></i></span>
                                    <h4>24/7 Service</h4>
                                    <p>Our support team is always available for queries and assistance.</p>
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
 
    <section class="flash_sell_2 flash_sell mt_95">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-md-3 col-xl-4">
                    <div class="section_heading_2 section_heading">
                        <h3><span>Trending Medical Equipment</span></h3>
                    </div>
                </div>
            </div>
            <div class="row mt_25 flash_sell_2_slider">


                @foreach ($products as $product)
                    <div class="col-xl-1-5 wow fadeInUp">
                        <div class="product_item_2 product_item shadow-sm p-2 mb-4 rounded"
                            style="background-color: #f9f9f9; border: 1px solid #e1e1e1;">

                            <!-- Product Image -->
                            <div class="product_img position-relative">
                                @if ($product->images->isNotEmpty())
                                    <img src="{{ asset('storage/' . $product->images->first()->image) }}"
                                        alt="{{ $product->name }}" class="img-fluid w-100">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}" alt="No Image Available"
                                        class="img-fluid w-100">
                                @endif

                                <!-- Discount / New Labels -->
                                <ul class="discount_list">
                                    <li class="new">New</li>
                                </ul>

                                <!-- Action Buttons -->
                                <ul class="btn_list">
                                    <li>
                                        <a href="#"><img src="assets/images/compare_icon_white.svg" alt="Compare"
                                                class="img-fluid"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="assets/images/love_icon_white.svg" alt="Love"
                                                class="img-fluid"></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="assets/images/cart_icon_white.svg" alt="Cart"
                                                class="img-fluid"></a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Product Text -->
                            <div class="product_text mt-2">
                                <a class="title" href="{{ route('web.detail', $product->slug) }}">{{ $product->name }}</a>
                                <p class="category mb-3">

                                    <a href="{{ route('shop.by.category', $product->category->slug) }}" class="cat-link">
                                        {{ $product->category->name ?? 'Uncategorized' }}
                                    </a>
                                </p>




                                @if (!empty($product->sizes) && is_array($product->sizes))
                                    <p class="sizes mb-1"><b>Sizes:</b>
                                        @foreach ($product->sizes as $size)
                                            <span class="size-tag"
                                                style="display:inline-block; background-color:#d9e6f8; color:#555; padding:2px 6px; margin-right:4px; border-radius:4px; font-size:12px;">
                                                {{ $size }}
                                            </span>
                                        @endforeach
                                    </p>
                                @endif



                                @if (!empty($product->colors) && is_array($product->colors))
                                    <p class="colors mb-0"
                                        style="display: flex; align-items: center; gap: 5px; font-size: 0.9rem;">
                                        <b style="margin-right: 5px;">Colors:</b>
                                        @foreach ($product->colors as $color)
                                            <span class="color-circle" title="{{ $color }}"
                                                style="display:inline-block; width:20px; height:20px; border-radius:50%; 
                         background-color: {{ $color }}; border:1px solid #ccc;"></span>
                                        @endforeach
                                    </p>
                                @endif


                            </div>

                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>

    <!--============================
                                                        FLASH SELL 2 END
                                                    ==============================-->


    <!--============================
                                                    SUBSCRIPTION 2 START
                                                =============================-->
    <section class="subscription_2 mt_50 xs_mt_60" style="background: url(assets/images/subscribe_2_bg.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-lg-8 wow fadeInUp">
                    <div class="subscription_2_text">
                        <h2>Get Upto <span>50% </span> Off on First Order</h2>
                        <p>Subscribe to our Newsletter</p>
                        <form action="#">
                            <input type="text" placeholder="Your email">
                            <button type="submit" class="common_btn">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
                                                    SUBSCRIPTION 2 END
                                                =============================-->

@endsection
