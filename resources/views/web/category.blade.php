@extends('web.layouts.app1')
@section('title', 'Product Category')
@section('content')
    <section class="page_banner" style="background: url(assets/images/page_banner_bg.jpg);">
        <div class="page_banner_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page_banner_text wow fadeInUp">
                            <h1>Category</h1>
                            <ul>
                                <li><a href="#"><i class="fal fa-home-lg"></i> Home</a></li>
                                <li><a href="#">Category</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="blog_classic blog_2 mt_75 mb_100">
        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-xxl-3 col-md-6 wow fadeInUp">
                        <div class="blog_item shadow-sm rounded border"
                            style="transition: all 0.3s ease; border-color: #e0e0e0;">

                            <!-- Blog Image -->
                            <a href="{{ route('shop.by.category', $category->slug) }}" class="blog_img">
                                @if ($category->icon)
                                    <img src="{{ asset('storage/' . $category->icon) }}" alt="{{ $category->name }}"
                                        class="img-fluid w-100" style="height:180px; object-fit:cover; width:100%;">
                                @else
                                    <img src="{{ asset('assets/images/blog_img_12.png') }}" alt="{{ $category->name }}"
                                        class="img-fluid w-100" style="height:180px; object-fit:cover; width:100%;">
                                @endif
                            </a>

                            <!-- Blog Text -->
                            <div class="blog_text p-3" style="background-color:#f9fafb;">
                                

                                <a class="title d-block mb-2" href="{{ route('shop.by.category', $category->slug) }}"
                                    style="color:#1b5e20; font-weight:600; font-size:1rem;">
                                    {{ $category->name }}
                                </a>

                                @if (!empty($category->description))
                                    <p class="text-muted mb-2" style="font-size:0.9rem;">
                                        {{ Str::limit($category->description, 80) }}
                                    </p>
                                @endif

                                <ul class="bottom d-flex justify-content-between align-items-center">
                                    <li>
                                        <a href="{{ route('shop.by.category', $category->slug) }}"
                                            class="btn btn-sm btn-success"
                                            style="font-size:0.8rem; padding:5px 12px; border-radius:20px; color:#fff;">
                                            Explore <i class="fas fa-long-arrow-right"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <span class="text-muted">
                                            <i class="fas fa-box"></i> {{ $category->products->count() }} Products
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>
    </section>



@endsection
