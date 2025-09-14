@include('web.layouts.header')

<nav class="main_menu_2 main_menu d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-wrap">
                <div class="main_menu_area">
                    <div class="menu_category_area">
                        <a href="index.html" class="menu_logo d-none">
                            <img src="{{ asset('assets/images/logo_2.png') }}" alt="Zenis" class="img-fluid w-100">
                        </a>
                        <div class="menu_category_bar">
                            <p>
                                <span>
                                    <img src="{{ asset('assets/images/bar_icon_white.svg') }}" alt="category icon">
                                </span>
                                Browse Categories
                            </p>
                            <i class="fas fa-chevron-down"></i>
                        </div>
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
                                                <li><a href="#">{{ $sub->name }}</a></li>
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

                    <ul class="menu_item">
                        <li><a class="active" href="{{ route('web.home') }}">Home</a></li>

                        <li>
                            <a href="#">Company <i class="fas fa-chevron-down"></i></a>
                            <ul class="menu_droapdown">
                                <li><a href="{{ route('web.about') }}">About Us</a></li>
                                <li><a href="{{ route('web.profile') }}">Company Profile</a></li>
                                <li><a href="{{ route('web.certification') }}">Certifications & Compliance</a></li>
                                <li><a href="{{ route('web.whyChose') }}">Why Choose Us</a></li>
                                <li><a href="{{ route('web.partners') }}">Partners & Clients</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#">Products <i class="fas fa-chevron-down"></i></a>
                            <ul class="menu_droapdown">
                                @foreach ($headerCategories as $cat)
                                    <li><a href="diagnostic_equipment.html">{{ $cat->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li><a href="{{ route('web.services') }}">Services</a></li>
                        <li><a href="{{ route('web.projects') }}">Our Projects</a></li>
                        <li><a href="{{ route('web.contacts') }}">Contact</a></li>
                    </ul>

                    <ul class="menu_icon">
                        <li>
                            <a class="user" href="dashboard.html">
                                <b>
                                    <img src="{{ asset('assets/images/user_icon_black.svg') }}" alt="cart" class="img-fluid">
                                </b>
                                <h5> Smith Jhon</h5>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</nav>

@include('web.layouts.mobilenav')

@yield('content')

@include('web.layouts.footer')
