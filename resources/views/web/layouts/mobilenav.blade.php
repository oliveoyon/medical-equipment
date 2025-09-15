<div class="mobile_menu_area">
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                class="fal fa-times"></i></button>
        <div class="offcanvas-body">

            <ul class="mobile_currency">
                <li>
                    <select class="select_js language">
                        <option>English</option>
                    </select>
                </li>
                <li>
                    <select class="select_js">
                        <option>$USD</option>
                    </select>
                </li>
            </ul>


            <form class="mobile_menu_search" action="{{ route('product.search') }}" method="POST">
                @csrf
                <input type="text" placeholder="Search">
                <button type="submit"><i class="far fa-search"></i></button>
            </form>

            <div class="mobile_menu_item_area">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Categories</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">menu</button>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <ul class="main_mobile_menu">
                            @foreach ($headerCategories as $cat)
                                <li class="mobile_dropdown">
                                    <a href="#">{{ $cat->name }}</a>
                                    @if ($cat->subcategories->count() > 0)
                                        <ul class="inner_menu">
                                            @foreach ($cat->subcategories as $sub)
                                                <li><a href="{{ route('shop.by.sub-category', $sub->slug) }}">{{ $sub->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <ul class="main_mobile_menu">
                            <li><a href="{{ route('web.home') }}">Home</a></li>

                            <li class="mobile_dropdown">
                                <a href="#">Company</a>
                                <ul class="inner_menu">
                                    <li><a href="{{ route('web.about') }}">About Us</a></li>
                                    <li><a href="{{ route('web.profile') }}">Company Profile</a></li>
                                    <li><a href="{{ route('web.certification') }}">Certifications & Compliance</a>
                                    </li>
                                    <li><a href="{{ route('web.whyChose') }}">Why Choose Us</a></li>
                                    <li><a href="{{ route('web.partners') }}">Partners & Clients</a></li>
                                </ul>
                            </li>

                            <li class="mobile_dropdown">
                                <a href="#">Products</a>
                                <ul class="inner_menu">
                                    @foreach ($headerCategories as $cat)
                                        <li><a href="{{ route('shop.by.category', $cat->slug) }}">{{ $cat->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li><a href="{{ route('web.services') }}">Services</a></li>
                            <li><a href="{{ route('web.projects') }}">Our Projects</a></li>
                            <li><a href="{{ route('web.contacts') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
