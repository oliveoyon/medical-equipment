

    @include('web.layouts.header')
    @include('web.layouts.nav')
    @include('web.layouts.mobilenav')


    <section class="banner_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-2  d-none d-xxl-block">
                    <ul class="menu_cat_item">
                        @php
                            $maxCategories = 9;
                            $totalCategories = $headerCategories->count();
                        @endphp

                        @foreach ($headerCategories->take($maxCategories) as $cat)
                            <li>
                                <a href="#">
                                    <span>
                                        <img src="{{ $cat->icon ? asset('storage/' . $cat->icon) : asset('assets/images/default_category.png') }}"
                                            alt="{{ $cat->name }}">
                                    </span>
                                    {{ $cat->name }}
                                </a>
                                @if ($cat->subcategories->count() > 0)
                                    <ul class="menu_cat_droapdown">
                                        @foreach ($cat->subcategories as $sub)
                                            <li><a href="{{ route('shop.by.sub-category', $sub->slug) }}">{{ $sub->name }}">{{ $sub->name }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach

                        @if ($totalCategories > $maxCategories)
                            <li class="all_category">
                                <a href="category.html">View All Categories <i class="far fa-arrow-right"></i></a>
                            </li>
                        @endif

                    </ul>
                </div>
                <div class="col-xxl-7 col-lg-8">
                    <div class="banner_content">
                        <div class="row banner_2_slider">
                            <div class="col-xl-12">
                                <div class="banner_slider_2 wow fadeInUp"
                                    style="background: url(assets/images/slider_1.jpg);">
                                    <div class="banner_slider_2_text">
                                        <h3>New arrivals of 2025</h3>
                                        <h1>Where Fashion Meets Individuality</h1>
                                        <a class="common_btn" href="shop_details.html">shop now <i
                                                class="fas fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="banner_slider_2 wow fadeInUp"
                                    style="background: url(assets/images/slider_2.jpg);">
                                    <div class="banner_slider_2_text">
                                        <h3>Trending of this month</h3>
                                        <h1>make your fashion look more changing</h1>
                                        <a class="common_btn" href="shop_details.html">shop now <i
                                                class="fas fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="banner_slider_2 wow fadeInUp"
                                    style="background: url(assets/images/slider_3.jpg);">
                                    <div class="banner_slider_2_text">
                                        <h3>Best selling of 2025</h3>
                                        <h1>Discover ypur Best fitting Clothes</h1>
                                        <a class="common_btn" href="shop_details.html">shop now <i
                                                class="fas fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-lg-4 col-sm-12 col-md-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="banner_2_add wow fadeInUp"
                                style="background: url(assets/images/banner_3_add_bg_1.jpg);">
                                <div class="text">
                                    <h4>Summer Offer</h4>
                                    <h2>Make Your Fashion Story Unique Every Day</h2>
                                    <a class="common_btn" href="shop_details.html">shop now <i
                                            class="fas fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @yield('content')
 
    @include('web.layouts.footer')