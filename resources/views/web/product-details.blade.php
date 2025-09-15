@extends('web.layouts.app1')
@section('title', 'About Us')
@section('content')

    <section class="page_banner" style="background: url(assets/images/page_banner_bg.jpg);">
        <div class="page_banner_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page_banner_text wow fadeInUp">
                            <h1>Shop Details</h1>
                            <ul>
                                <li><a href="#"><i class="fal fa-home-lg"></i> Home</a></li>
                                <li><a href="#">Shop</a></li>
                                <li><a href="#">Shop Details</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop_details mt_100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-10">
                    <div class="row">
                        <div class="col-lg-6 col-md-10 wow fadeInLeft">
                            <div class="shop_details_slider_area">
                                <div class="row">
                                    <!-- Thumbnails nav -->
                                    <div class="col-xl-2 col-lg-3 col-md-3 order-2 order-md-1">
                                        <div class="row details_slider_nav">
                                            @foreach ($product->images as $img)
                                                <div class="col-12">
                                                    <div class="details_slider_nav_item">
                                                        <img src="{{ asset('storage/' . $img->image) }}"
                                                            alt="{{ $product->name }}" class="img-fluid w-100">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Main slider -->
                                    <div class="col-xl-10 col-lg-9 col-md-9 order-md-1">
                                        <div class="row details_slider_thumb">
                                            @foreach ($product->images as $img)
                                                <div class="col-12">
                                                    <div class="details_slider_thumb_item">
                                                        <img src="{{ asset('storage/' . $img->image) }}"
                                                            alt="{{ $product->name }}" class="img-fluid w-100">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 wow fadeInUp">
                            <div class="shop_details_text">
                                <p class="category">
                                    <a href="{{ route('shop.by.category', $product->category->slug) }}">
                                        {{ $product->category->name }}
                                    </a>
                                    /
                                    <a href="{{ route('shop.by.sub-category', $product->subcategory->slug) }}">
                                        {{ $product->subcategory->name }}
                                    </a>
                                </p>
                                </p>
                                <h2 class="details_title">{{ $product->name }}</h2>
                                <div class="d-flex flex-wrap align-items-center">
                                    <p class="stock">In Stock</p>
                                    <!-- <p class="out_stock stock">out of Stock</p> -->
                                    <p class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </p>
                                </div>
                                {{-- <h3 class="price">Call for Price</h3> --}}
                                <p class="short_description pt-3">
                                    {{ \Illuminate\Support\Str::words($product->description, 20, '...') }}
                                </p>
                                <!-- Color Variant -->
                                <!-- Color Variant -->
                                @if (!empty($product->colors) && count($product->colors) > 0)
                                    <div class="details_single_variant">
                                        <p class="variant_title">Color :</p>
                                        <ul class="details_variant_color">
                                            @foreach ($product->colors as $color)
                                                <li @if ($loop->first) class="active" @endif
                                                    style="background: {{ $color }};">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!-- Size Variant -->


                                <ul class="size mb-3"
                                    style="display:flex;gap:8px;list-style:none;padding:0;margin:12px 0 0;">
                                    @if (!empty($product->sizes) && count($product->sizes) > 0)
                                        @foreach ($product->sizes as $size)
                                            <li style="padding:5px 12px;border:1px solid #ccc;border-radius:6px;
                                                font-size:10px;text-transform:uppercase;cursor:pointer;
                                                background:#f9f9f9;transition:all 0.3s ease;"
                                                onmouseover="this.style.background='#10b981';this.style.color='#fff';this.style.border='1px solid #10b981';"
                                                onmouseout="this.style.background='#f9f9f9';this.style.color='#000';this.style.border='1px solid #ccc';">
                                                {{ $size }}
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>


                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="details_btn_area w-100 mb-2">
                                        <a href="tel:{{ $generalSetting->phone }}"
                                            class="common_btn buy_now w-100 text-center py-3 rounded"
                                            style="background: #10b981; color: #fff; font-weight: 600; text-decoration: none; display: inline-block; transition: background 0.3s;">
                                            Call Now: {{ $generalSetting->phone }} <i class="fas fa-long-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>

                                <script>
                                    // Optional hover effect
                                    document.querySelectorAll('.common_btn.buy_now').forEach(btn => {
                                        btn.addEventListener('mouseenter', () => btn.style.background = '#059669');
                                        btn.addEventListener('mouseleave', () => btn.style.background = '#10b981');
                                    });
                                </script>



                                <ul class="details_tags_sku mt-5">
                                    <li><span>Model:</span> {{ $product->model }}</li>
                                    <li><span>Category:</span> {{ $product->category->name }}</li>
                                    <li><span>Subcategory:</span> {{ $product->subcategory->name }}</li>
                                </ul>

                                <ul class="shop_details_shate">
                                    <li>Share:</li>
                                    <li><a href="{{ $generalSetting->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li><a href="{{ $generalSetting->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{ $generalSetting->instagram }}"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li><a href="{{ $generalSetting->linkedin }}"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="https://wa.me/{{ $generalSetting->phone }}"><i
                                                class="fab fa-whatsapp"></i></a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="row mt_90 wow fadeInUp">
                        <div class="col-12">
                            <div class="shop_details_des_area">
                                <ul class="nav nav-pills" id="pills-tab2" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="description-tab" data-bs-toggle="pill"
                                            data-bs-target="#description" type="button" role="tab"
                                            aria-controls="description" aria-selected="false">Description</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="description-tab2" data-bs-toggle="pill"
                                            data-bs-target="#description2" type="button" role="tab"
                                            aria-controls="description2" aria-selected="false">Additional info</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="description-tab3" data-bs-toggle="pill"
                                            data-bs-target="#description3" type="button" role="tab"
                                            aria-controls="description3" aria-selected="false">Brand</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="description-tab4" data-bs-toggle="pill"
                                            data-bs-target="#description4" type="button" role="tab"
                                            aria-controls="description4" aria-selected="false">Documents</button>
                                    </li>

                                </ul>

                                <div class="tab-content" id="pills-tabContent2">
                                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                                        aria-labelledby="description-tab" tabindex="0">
                                        <div class="shop_details_description">
                                            {!! $product->description !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="description2" role="tabpanel"
                                        aria-labelledby="description-tab2" tabindex="0">

                                        {!! $product->specifications !!}

                                    </div>
                                    <div class="tab-pane fade" id="description3" role="tabpanel"
                                        aria-labelledby="description-tab3" tabindex="0">
                                        <div class="shop_details_vendor">
                                            <div class="shop_details_vendor_logo_area">
                                                <div class="img">
                                                    <img src="{{ asset('storage/' . $product->brand->logo) }}"
                                                        alt="Vendor" class="img-fluid">
                                                </div>
                                                <h3>
                                                    {{ $product->brand->name }}

                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="description4" role="tabpanel"
                                        aria-labelledby="description-tab4" tabindex="0">

                                        <div class="product-documents">
                                            @forelse($product->documents as $doc)
                                                @php
                                                    $extension = strtolower(pathinfo($doc->file, PATHINFO_EXTENSION));
                                                @endphp

                                                @if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                                                    <div class="mb-3">
                                                        <img src="{{ asset('storage/' . $doc->file) }}"
                                                            alt="Document Image" class="img-fluid rounded shadow-sm">
                                                    </div>
                                                @elseif($extension === 'pdf')
                                                    <div class="mb-3">
                                                        <embed src="{{ asset('storage/' . $doc->file) }}"
                                                            type="application/pdf" width="100%" height="500px" />
                                                    </div>
                                                @else
                                                    <div class="mb-3">
                                                        <a href="{{ asset('storage/' . $doc->file) }}" target="_blank"
                                                            class="btn btn-sm btn-secondary">
                                                            View File ({{ strtoupper($extension) }})
                                                        </a>
                                                    </div>
                                                @endif
                                            @empty
                                                <p>No documents available.</p>
                                            @endforelse
                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-2 wow fadeInRight">
                    <div id="sticky_sidebar_2">
                        <div class="shop_details_sidebar">
                            <div class="row">
                                <div class="col-xxl-12 col-md">
                                    <div class="shop_details_sidebar_info">
                                        <ul>
                                            <li>
                                                <span>
                                                    <!-- globe icon -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                                                    </svg>
                                                </span>
                                                Available Nationwide
                                            </li>
                                            <li>
                                                <span>
                                                    <!-- shield/check icon -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                                    </svg>
                                                </span>
                                                Trusted Quality Products
                                            </li>
                                            <li>
                                                <span>
                                                    <!-- cash/delivery icon -->
                                                    <svg fill="#7D7B7B" height="800px" width="800px" version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.015 512.015"
                                                        xml:space="preserve">
                                                        <path d="M341.333,273.074c75.281,0,136.533-61.252,136.533-136.533S416.614,0.008,341.333,0.008
                                        C266.052,0.008,204.8,61.26,204.8,136.541S266.052,273.074,341.333,273.074z" />
                                                    </svg>
                                                </span>
                                                Flexible Purchase Options
                                            </li>
                                        </ul>
                                        <h5>Support & Policies</h5>
                                        <ul>
                                            <li>
                                                <span>
                                                    <!-- return icon -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                                                    </svg>
                                                </span>
                                                Easy Replacement Policy
                                            </li>
                                            <li>
                                                <span>
                                                    <!-- warranty icon -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                                                    </svg>
                                                </span>
                                                Dedicated After-Sales Support
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-xxl-12 col-md">
                                    <div class="shop_details_sidebar_store">
                                        <p class="sold_by">Powered by</p>
                                        <h4 class="store_name">{{ $product->brand->name }}</h4>
                                        <ul>
                                            <li>
                                                <p>Customer Trust</p>
                                                <span>4.5 ★ (320 Reviews)</span>
                                            </li>
                                            <li>
                                                <p>On-Time Delivery</p>
                                                <span>100%</span>
                                            </li>
                                            <li>
                                                <p>Support Responsiveness</p>
                                                <span>90%</span>
                                            </li>
                                        </ul>
                                        <a class="go_store" href="{{ route('web.category') }}">Explore More</a>
                                        <a class="chat" href="{{ route('web.contacts') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                                            </svg>
                                            Contact Us
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="related_products mt_90 mb_70 wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="section_heading_2 section_heading">
                        <h3><span>Related</span> Products</h3>
                    </div>
                </div>
            </div>
            <div class="row mt_25 flash_sell_2_slider">
                @foreach ($relatedProducts as $relpdt)
                    <div class="col-xl-1-5">
                        <div class="product_item_2 product_item">
                            <div class="product_img">
                                @if ($relpdt->images->isNotEmpty())
                                    <img src="{{ asset('storage/' . $relpdt->images->first()->image) }}"
                                        alt="{{ $relpdt->name }}">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}" alt="No Image">
                                @endif

                                <ul class="discount_list">
                                    <li class="new"> new</li>
                                </ul>
                                <ul class="btn_list">
                                    <li>
                                        <a href="#">
                                            <img src="assets/images/compare_icon_white.svg" alt="Compare"
                                                class="img-fluid">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="assets/images/love_icon_white.svg" alt="Love"
                                                class="img-fluid">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="assets/images/cart_icon_white.svg" alt="Love"
                                                class="img-fluid">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product_text">
                                <a class="title"
                                    href="{{ route('web.detail', $relpdt->slug) }}">{{ $relpdt->name }}</a>
                                <p class="price mt-3 mb-1">
                                    <a href="{{ route('shop.by.category', $relpdt->category->slug) }}"
                                        style="color:#079225;text-decoration:none;font-weight:600;">
                                        {{ $relpdt->category->name }}
                                    </a>
                                </p>

                                <p class="muted">
                                    <a href="{{ route('shop.by.sub-category', $relpdt->subcategory->slug) }}"
                                        style="color:#555;text-decoration:none;">
                                        {{ $relpdt->subcategory->name }}
                                    </a>
                                </p>

                                {{-- Colors --}}
                                <ul class="color mb-3"
                                    style="display:flex;gap:6px;list-style:none;padding:0;margin:8px 0 0;">
                                    @if (!empty($relpdt->colors) && count($relpdt->colors) > 0)
                                        @foreach ($relpdt->colors as $color)
                                            <li style="width:22px;height:22px;border-radius:50%;background:{{ $color }};
                       border:2px solid #eee;cursor:pointer;transition:all 0.3s ease;"
                                                onmouseover="this.style.border='2px solid #333';"
                                                onmouseout="this.style.border='2px solid #eee';">
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>

                                {{-- Sizes --}}
                                <ul class="size"
                                    style="display:flex;gap:8px;list-style:none;padding:0;margin:12px 0 0;">
                                    @if (!empty($relpdt->sizes) && count($relpdt->sizes) > 0)
                                        @foreach ($relpdt->sizes as $size)
                                            <li style="padding:5px 12px;border:1px solid #ccc;border-radius:6px;
                       font-size:10px;text-transform:uppercase;cursor:pointer;
                       background:#f9f9f9;transition:all 0.3s ease;"
                                                onmouseover="this.style.background='#10b981';this.style.color='#fff';this.style.border='1px solid #10b981';"
                                                onmouseout="this.style.background='#f9f9f9';this.style.color='#000';this.style.border='1px solid #ccc';">
                                                {{ $size }}
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection
