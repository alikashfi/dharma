<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="description" content="Brancy - Cosmetic & Beauty Salon Website Template">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.png">

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
     <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
     {{-- <link rel="stylesheet" href="/assets/css/vendor/bootstrap.rtl.min.css"> --}}

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="/assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/Vazirmatn-FD-font-face.css">
    <link rel="stylesheet" href="/assets/css/plugins/fancybox.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/nice-select.css">

    @livewireStyles
    @stack('style')

    <!-- Style CSS -->
    <link rel="stylesheet" href="/assets/css/style.min.css">

    <style>
        .offcanvas-menu-nav a:not(:only-child):after {
            left: 0;
            right: unset;
        }
        .breadcrumb-item+.breadcrumb-item:before {
            float: right;
            padding-left: 0.5rem;
        }
        .breadcrumb-item+.breadcrumb-item {
            padding-left: 0;
        }
        .remove {
            right: unset !important;
        }
        .shopping-checkout-wrap .title:before {
            left: unset;
        }
        .btn-order {
            border-style: solid;
            width: 100%;
        }
        .myaccount-content .account-details-form .single-input-item label {
            font-size: inherit;
        }
        .mega-title {
            cursor: pointer !important;
        }
        .product-item-image-inavailable {
            opacity: .5;
        }
        .product-item:hover .product-item-image-inavailable {
            opacity: 1;
        }
        .main-nav>li:first-child>a {
            padding-right: 0;
            padding-left: 12px;
        }
        .main-nav>li:first-child {
            margin-right: 0;
            margin-left: 20px;
        }
        .main-nav>li:last-child>a {
            padding-right: 12px;
            padding-left: 0;
        }
        .main-nav>li:last-child {
            margin-right: 20px;
            margin-left: 0;
        }
        .offcanvas-menu-nav li ul li a {
            padding-top: 8px !important;
            padding-bottom: 8px !important;
        }
        .submenu-nav-mega, .submenu-nav {
            border-radius: 10px !important;
        }
        a.mega-title {
            height: 100px;
        }
    </style>
</head>

<body>

<!--== Wrapper Start ==-->
<div class="wrapper">

    @include('partials.header')

    <main class="main-content">
        @includeWhen(isset($breadcrumb), 'partials.breadcrumb', $breadcrumb ?? null)
        @include('partials.flash')
        @yield('content')
    </main>

    @include('partials.footer')

    <!--== Scroll Top Button ==-->
    <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-up"></span></div>

    <!--== Start Product Quick Wishlist Modal ==-->
    <aside class="product-action-modal modal fade" id="action-WishlistModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="product-action-view-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                            <i class="fa fa-times"></i>
                        </button>
                        <div class="modal-action-messages">
                            <i class="fa fa-check-square-o"></i> Added to wishlist successfully!
                        </div>
                        <div class="modal-action-product">
                            <div class="thumb">
                                <img src="/assets/images/shop/modal1.webp" alt="Organic Food Juice" width="466" height="320">
                            </div>
                            <h4 class="product-name"><a href="product-details.html">Readable content DX22</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!--== End Product Quick Wishlist Modal ==-->

    <!--== Start Product Quick Add Cart Modal ==-->
    <aside class="product-action-modal modal fade" id="action-CartAddModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="product-action-view-content">
                        <button type="button" class="btn-close bg-success" data-bs-dismiss="modal">
                            <i class="fa fa-times"></i>
                        </button>
                        <div class="modal-action-messages d-flex justify-content-center">
                            <i class="fa fa-check-square-o ms-1"></i> به سبد خرید اضافه شد!
                        </div>
                        <div class="modal-action-product">
                            <div class="thumb">
                                {{-- <img src="/assets/images/shop/modal1.webp" alt="Organic Food Juice" width="466" height="320"> --}}
                            </div>
                            {{-- <h4 class="product-name"><a href="product-details.html">Readable content DX22</a></h4> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!--== End Product Quick Add Cart Modal ==-->


    <!--== Start Aside Search Form ==-->
    <aside class="aside-search-box-wrapper offcanvas offcanvas-top" tabindex="-1" id="AsideOffcanvasSearch"
           aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
            <h5 class="d-none" id="offcanvasTopLabel">Aside Search</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa fa-close"></i></button>
        </div>
        <div class="offcanvas-body">
            <div class="container pt--0 pb--0">
                <div class="search-box-form-wrap">
                    <div class="search-note">
                        <p class="text-danger">قابلیت جستجو بزودی اضافه خواهد شد.</p>
                        <p>جستجو در بین تمام محصولات سایت</p>
                    </div>
                    <form action="#" {{-- method="post" --}}>
                        <div class="aside-search-form position-relative">
                            <label for="SearchInput" class="visually-hidden">Search</label>
                            <input id="SearchInput" type="search" class="form-control" placeholder="دنبال چی میگردی؟">
                            <button class="search-button" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </aside>
    <!--== End Aside Search Form ==-->

    <!--== Start Aside Cart ==-->
    <aside class="aside-cart-wrapper offcanvas offcanvas-end" tabindex="-1" id="AsideOffcanvasCart" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h1 class="d-none" id="offcanvasRightLabel">Shopping Cart</h1>
            <button class="btn-aside-cart-close" data-bs-dismiss="offcanvas" aria-label="Close">سبد خرید <i
                        class="fa fa-chevron-right"></i></button>
        </div>
        <div class="offcanvas-body">
            @livewire('shopping-cart')
            <a class="btn-total" href="{{ route('cart') }}">دیدن سبد خرید</a>
            <a class="btn-total" href="{{ route('checkout') }}">پرداخت نهایی</a>
        </div>
    </aside>
    <!--== End Aside Cart ==-->

    <!--== Start Aside Menu ==-->
    <aside class="off-canvas-wrapper offcanvas offcanvas-start" tabindex="-1" id="AsideOffcanvasMenu"
           aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h1 class="d-none" id="offcanvasExampleLabel">Aside Menu</h1>
            <button class="btn-menu-close" data-bs-dismiss="offcanvas" aria-label="Close">{{ __('menu') }} <i class="fa fa-chevron-left"></i></button>
        </div>
        <div class="offcanvas-body">
            <div id="offcanvasNav" class="offcanvas-menu-nav">
                <ul>
                    <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="{{ route('home') }}">خانه</a></li>
                    <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item">{{ __('shop') }}</a>
                        <ul>
                            <li><a href="{{ route('shop') }}">همه محصولات</a></li>
                            @foreach($headerCategories->where('parent_id', null) as $category)
                                <li><a class="offcanvas-nav-item">{{ $category->name }}</a>
                                    <ul>
                                        <li><a href="{{ route('category', $category->slug) }}">همه {{ $category->name }} ها</a></li>
                                        @foreach($headerCategories->where('parent_id', $category->id) as $category)
                                            <li><a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item">درباره ما</a>
                        <ul class="submenu-nav">
                            <li><a href="{{ route('about') }}">درباره ما</a></li>
                            <li><a href="{{ route('contact') }}">تماس با ما</a></li>
                            <li><a href="{{ route('faq') }}">سوالات متداول</a></li>
                            <li><a href="{{ route('privacy-policy') }}">قوانین</a></li>
                        </ul>
                    </li>
                    <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="{{ $settings->instagramLink }}">{{ $settings->instagramTitle }}</a></li>
                </ul>
            </div>
        </div>
    </aside>
    <!--== End Aside Menu ==-->

</div>
<!--== Wrapper End ==-->

<!-- JS Vendor, Plugins & Activation Script Files -->

<!-- Vendors JS -->
<script src="/assets/js/vendor/modernizr-3.11.7.min.js"></script>
<script src="/assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="/assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
<script src="/assets/js/vendor/bootstrap.bundle.min.js"></script>

<!-- Plugins JS -->
<script src="/assets/js/plugins/swiper-bundle.min.js"></script>
<script src="/assets/js/plugins/fancybox.min.js"></script>
<script src="/assets/js/plugins/jquery.nice-select.min.js"></script>

@livewireScripts
@stack('script')

<!-- Custom Main JS -->
<script src="/assets/js/main.js"></script>

</body>

</html>