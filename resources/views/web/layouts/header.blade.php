<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>Silmimeditech - @yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mobile_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/scroll_button.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.pwstabs.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/range_slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/multiple-image-video.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated_barfiller.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom_spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    @stack('styles')
</head>

<body class="default_home">
    <header class="header_2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="header_logo_area">
                        <a href="{{ route('web.home') }}" class="header_logo">
                            @if ($generalSetting && $generalSetting->logo)
                                <img src="{{ asset('storage/' . $generalSetting->logo) }}"
                                    alt="{{ $generalSetting->company_name }}" class="img-fluid w-100">
                            @endif

                        </a>
                        <div class="mobile_menu_icon d-block d-lg-none" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                            <span class="mobile_menu_icon"><i class="far fa-stream menu_icon_bar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-5 col-lg-5 d-none d-lg-block">
                    <form action="{{ route('product.search') }}" method="POST">
                        @csrf
                        <select class="select_2" name="category">
                            <option value="">All Categories</option>
                            @foreach ($headerCategories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @foreach ($cat->subcategories as $sub)
                                    <option value="sub_{{ $sub->id }}">— {{ $sub->name }}</option>
                                @endforeach
                            @endforeach
                        </select>

                        <div class="input">
                            <input type="text" name="query" placeholder="Search your product..."
                                value="{{ old('query') }}">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-xxl-4 col-xl-5 col-lg-5 d-none d-lg-flex">
                    <div class="header_support_user d-flex flex-wrap">
                        <div class="header_support">
                            <span class="icon">
                                <i class="far fa-phone-alt"></i>
                            </span>
                            <h3>
                                Hotline:
                                <a href="callto:1234567890">
                                    <span>{{ $generalSetting->phone }}</span>
                                </a>
                            </h3>
                        </div>
                    </div>
                    <div class="topbar_right d-flex flex-wrap align-items-center justify-content-end">
                        <select class="select_js language">
                            <option>English</option>

                        </select>
                        <select class="select_js">
                            <option>$USD</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </header>
