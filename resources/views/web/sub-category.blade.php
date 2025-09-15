@extends('web.layouts.app1')
@section('title', 'About Us')
@section('content')
    <style>
        .category-box {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 16px;
            max-width: 260px;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.08);
        }

        .category-box .title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 12px;
            color: #1e293b;
            /* dark blue-gray */
        }

        .category-box ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .category-box li {
            margin-bottom: 6px;
        }

        /* Category wrapper */
        .cat-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(59, 130, 246, 0.1);
            /* soft blue */
            border-radius: 6px;
            padding: 10px 12px;
            cursor: default;
            transition: background 0.3s;
        }

        .cat-wrapper:hover {
            background: rgba(59, 130, 246, 0.2);
        }

        .cat-wrapper .cat-link {
            color: #1e40af;
            /* dark blue */
            font-weight: 600;
            text-decoration: none;
            flex: 1;
        }

        .cat-wrapper .toggle-arrow {
            margin-left: 8px;
            cursor: pointer;
            transition: transform 0.3s;
            user-select: none;
            color: #1e40af;
        }

        li.open>.cat-wrapper .toggle-arrow {
            transform: rotate(90deg);
        }

        /* Subcategories */
        .category-box ul ul {
            display: none;
            margin-top: 6px;
            margin-left: 12px;
            /* indent subcategories */
        }

        li.open>ul {
            display: block;
        }

        .category-box ul ul li {
            margin-bottom: 4px;
        }

        .category-box ul ul a {
            display: flex;
            justify-content: space-between;
            background: rgba(249, 115, 22, 0.08);
            /* soft orange */
            color: #b45309;
            /* dark orange text */
            text-decoration: none;
            font-size: 14px;
            padding: 8px 10px;
            border-radius: 6px;
            transition: background 0.3s, transform 0.2s;
        }

        .category-box ul ul a:hover {
            background: rgba(249, 115, 22, 0.2);
            color: #9a3412;
            transform: translateX(2px);
        }

        /* Active states */
        li.open>.cat-wrapper,
        /* active category */
        .cat-wrapper.active {
            background: rgba(59, 130, 246, 0.25);
            color: #1e3a8a;
        }

        .category-box ul ul a.active {
            background: rgba(249, 115, 22, 0.25);
            color: #7c2d12;
            font-weight: 600;
        }
    </style>
    <section class="page_banner" style="background: url({{ asset('assets/images/page_banner_bg.jpg') }});">
        <div class="page_banner_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page_banner_text wow fadeInUp">
                            <h1>{{ $catName ?? ($catName ?? 'Products') }}</h1>
                            <ul>
                                <a href="{{ url('/') }}">
                                    @if (!empty($subcatName))
                                        <li><a href="#">{{ $subcatName }}</a></li>
                                    @endif
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop_page mt_100 mb_100">
        <div class="container">
            <div class="row">
                <div class="col-xxl-2 col-lg-4 col-xl-3">
                    <div id="sticky_sidebar">
                        <div class="shop_filter_btn d-lg-none"> Filter </div>
                        <div class="shop_filter_area">

                            <div class="category-box">
                                <h3 class="title">Categories</h3>
                                <ul>
                                    @foreach ($headerCategories as $cat)
                                        <li class="{{ isset($catID) && $cat->id == $catID ? 'open' : '' }}">
                                            <div class="cat-wrapper">
                                                <!-- Category link -->
                                                <a href="{{ route('shop.by.category', $cat->slug) }}" class="cat-link">
                                                    {{ $cat->name }}
                                                </a>

                                                <!-- Toggle arrow -->
                                                @if ($cat->subcategories->count() > 0)
                                                    <span class="toggle-arrow">▶</span>
                                                @endif
                                            </div>

                                            @if ($cat->subcategories->count() > 0)
                                                <ul>
                                                    @foreach ($cat->subcategories as $sub)
                                                        <li>
                                                            <a href="{{ route('shop.by.sub-category', $sub->slug) }}"
                                                                class="{{ isset($subcatID) && $sub->id == $subcatID ? 'active' : '' }}">
                                                                {{ $sub->name }}
                                                                <span>{{ $sub->products_count ?? '' }}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-10 col-lg-8 col-xl-9">

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                            tabindex="0">
                            <div class="row">

                                @if ($products->isEmpty())
                                    <div class="col-12">
                                        <p>No products found.</p>
                                    </div>
                                @else
                                    @foreach ($products as $product)
                                        <div class="col-xxl-3 col-6 col-md-4 col-lg-6 col-xl-4 wow fadeInUp">
                                            <div class="product_item_2 product_item shadow-sm p-2 mb-4 rounded"
                                                style="background-color: #f9f9f9; border: 1px solid #e1e1e1;">

                                                <!-- Product Image -->
                                                <div class="product_img position-relative">
                                                    <img src="{{ $product->images->isNotEmpty() ? asset('storage/' . $product->images->first()->image) : asset('assets/images/no-image.png') }}"
                                                        alt="{{ $product->name }}" class="img-fluid w-100">

                                                    <!-- Discount / New Labels -->
                                                    <ul class="discount_list">
                                                        <li class="new">New</li>
                                                    </ul>

                                                    <!-- Action Buttons -->
                                                    <ul class="btn_list">
                                                        <li>
                                                            <a href="#"><img
                                                                    src="{{ asset('assets/images/compare_icon_white.svg') }}"
                                                                    alt="Compare" class="img-fluid"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img
                                                                    src="{{ asset('assets/images/love_icon_white.svg') }}"
                                                                    alt="Love" class="img-fluid"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img
                                                                    src="{{ asset('assets/images/cart_icon_white.svg') }}"
                                                                    alt="Cart" class="img-fluid"></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <!-- Product Text --> 

                                                <div class="product_text mt-2">
                                                    <a class="title mb-3"
                                                        href="{{ route('web.detail', $product->slug) }}">{{ $product->name }}</a>

                                                    <!-- Sizes -->
                                                    @if (!empty($product->sizes) && is_array($product->sizes))
                                                        <p class="sizes mb-1">
                                                            @foreach ($product->sizes as $size)
                                                                <span
                                                                    style="display:inline-block; background:#e0e0e0; color:#555; padding:2px 6px; border-radius:10px; font-size:0.75rem; margin-right:3px;">
                                                                    {{ $size }}
                                                                </span>
                                                            @endforeach
                                                        </p>
                                                    @endif

                                                    <!-- Colors -->
                                                    @if (!empty($product->colors) && is_array($product->colors))
                                                        <p class="colors mb-0"><b>Colors:</b>
                                                            @foreach ($product->colors as $color)
                                                                <span class="color-circle" title="{{ $color }}"
                                                                    style="display:inline-block; width:16px; height:16px; border-radius:50%; background-color: {{ $color }}; border:1px solid #ccc; margin-right:3px;"></span>
                                                            @endforeach
                                                        </p>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script>
        // Toggle subcategories only when arrow is clicked
        document.querySelectorAll(".category-box .toggle-arrow").forEach(arrow => {
            arrow.addEventListener("click", (e) => {
                const parentLi = arrow.closest("li");
                parentLi.classList.toggle("open");
                e.stopPropagation(); // prevent link navigation
            });
        });
    </script>

@endsection
