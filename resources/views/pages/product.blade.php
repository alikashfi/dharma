@extends('layouts.main', ['breadcrumb' => [
    'links' => [
        $product->category->name => route('category', $product->category->slug),
        $product->name
    ]
]])

@section('title', 'خرید ' . $product->title)
@section('description', $product->metaDescription)

@section('content')
    <!--== Start Product Details Area Wrapper ==-->
    <section class="section-space pt-3">
        <div class="container">
            <div class="row product-details">
                <div class="col-lg-6">
                    <div>
                        <!-- top gallery -->
                        <main class="swiper gallery">
                            <div class="swiper-wrapper">
                                @foreach($product->media as $image)
                                    <div class="swiper-slide">
                                        <div class="swiper-zoom-container">
                                            <img class="gallery-image" src="{{ $image->getUrl() }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div title="next" class="swiper-button-next swiper-button-white"></div>
                            <div title="prev" class="swiper-button-prev swiper-button-white"></div>
                        </main>

                        <!-- thumbs -->
                        <div class="swiper gallery-thumbs">
                            <div class="swiper-wrapper">
                                @foreach($product->media as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ $image->getUrl() }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-details-content ps-0">
                        <div class="d-flex align-items-center text-muted"><p class="my-0 ms-1">دسته بندی: </p><h5 class="product-details-collection d-inline mt-3"><a href="{{ route('category', $product->category->slug) }}">{{ $product->category->name }}</a></h5></div>
                        <h3 class="product-details-title">{{ $product->name }}</h3>
                        {{-- <div class="product-details-review mb-7"> --}}
                        {{--     <div class="product-review-icon"> --}}
                        {{--         <i class="fa fa-star-o"></i> --}}
                        {{--         <i class="fa fa-star-o"></i> --}}
                        {{--         <i class="fa fa-star-o"></i> --}}
                        {{--         <i class="fa fa-star-o"></i> --}}
                        {{--         <i class="fa fa-star-half-o"></i> --}}
                        {{--     </div> --}}
                        {{--     <button type="button" class="product-review-show">150 reviews</button> --}}
                        {{-- </div> --}}
                        @if ($product->code)
                            <p class="mb-4">کد محصول: {{ $product->code }}</p>
                        @endif
                        <div class="mb-5">{!! $product->description !!}</div>
                        <div class="product-details-action">
                            <h4 class="price">{{ $product->priceFormatted }} تومان</h4>
                            <div class="product-details-cart-wishlist">
                                {{-- <button type="button" class="btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal"><i class="fa fa-heart-o"></i></button> --}}
                                <button onclick="Livewire.emit('addToCart', {{ $product->id }})" class="btn ps-5 me-md-4" style="letter-spacing: 0" data-bs-toggle="modal" data-bs-target="#action-CartAddModal" >
                                    {{ $product->is_available ? 'افزودن به سبد خرید' : 'ناموجود' }}
                                </button>
                            </div>
                        </div>
                        <div class="product-details-action">
                            <a href="{{ $settings->instagramLink }}" class="igbtn text-white" style="letter-spacing: 0; background-image: linear-gradient(to right, #DF4384 0%, #DD2A7B 51%, #8134AF 100%);">
                                {{ $settings->instagramButton }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Product Details Area Wrapper ==-->

    <!--== Start Similar Products Area Wrapper ==-->
    <section class="section-space">
        <div class="container">
            <div class="row">
                <div class="section-title text-center">
                    <h2 class="title">{{ $product->category->name }} های مشابه</h2>
                </div>
            </div>
            <div class="row product-details">
                    @foreach($similarProducts as $similarProduct)
                        @include('partials.product-item', ['product' => $similarProduct])
                    @endforeach
            </div>
            <div class="row">
                <div class="text-center mt-10">
                    <a class="fs-5 text-primary" href="{{ route('category', $product->category->slug) }}">« {{ $product->category->name }} های بیشتر ... »</a>
                </div>
            </div>
        </div>
    </section>
    <!--== End Similar Products Area Wrapper ==-->
@endsection

{{--@push('script')--}}
{{--    <script type="application/ld+json" defer>--}}
{{--            {--}}
{{--                "@context": "https://schema.org/",--}}
{{--                "@type": "BreadcrumbList",--}}
{{--                "itemListElement": [{--}}
{{--                        "@type": "ListItem",--}}
{{--                        "position": 1,--}}
{{--                        "name": "{{ $social->name }}",--}}
{{--                        "item": "{{ route('social', $social->slug) }}"--}}
{{--                    },{--}}
{{--                        "@type": "ListItem",--}}
{{--                        "position": 2,--}}
{{--                        "name": "{{ $category->name }}",--}}
{{--                        "item": "{{ route('category', ['social' => $social->slug, 'category' => $category->slug]) }}"--}}
{{--                    }--}}
{{--                ]--}}
{{--            }--}}
{{--        </script>--}}
{{--@endpush--}}

<style>
    .igbtn {
        flex: 1 1 auto;
        margin: 10px;
        padding: 17px;
        text-align: center;
        text-transform: uppercase;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;
        /* text-shadow: 0px 0px 10px rgba(0,0,0,0.2);*/
        box-shadow: 0 0 20px #eee;
        border-radius: 10px;
        border: none;
    }
    .igbtn:hover {
        background-position: right center; /* change the direction of the change here */
    }

    /* galleryTop */
    .swiper.gallery {
        height: max-content !important;
    }
    .gallery .swiper-slide {
        cursor: pointer;
    }
    .gallery img {
        width: 100%;
        height: auto;
    }
    .swiper-zoom-container img {
        border-radius: 10px;
        margin-bottom: 10px;
    }

    /* thumbs */
    .swiper.gallery-thumbs {
        height: max-content !important;
    }
    .gallery-thumbs .swiper-slide {
        width: auto;
        border-radius: 10px;
        opacity: 0.8;
        -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
        filter: grayscale(100%);
    }
    .gallery-thumbs .swiper-slide-active {
        opacity: 1;
        -webkit-filter: initial; /* Safari 6.0 - 9.0 */
        filter: initial;
        font-weight: bold;
        color: #231b93;
    }
    .gallery-thumbs img {
        cursor: pointer;
        width: auto;
        height: 100px;
        border-radius: 10px;
        object-fit: contain;
    }

    /* buttons */
    .swiper-button-next {
        width: 50%;
        top: 0;
        right: 0;
        padding-right: 15px;
        opacity: 0.2;
        -webkit-transition: opacity 0.6s; /* For Safari 3.1 to 6.0 */
        transition: opacity 0.6s;
    }
    .swiper-button-prev {
        width: 50%;
        top: 0;
        left: 0;
        padding-left: 15px;
        opacity: 0.2;
        -webkit-transition: opacity 0.6s; /* For Safari 3.1 to 6.0 */
        transition: opacity 0.6s;
    }
    .swiper-button-prev:hover, .swiper-button-next:hover {
        opacity: 1;
    }
    .swiper-button-next:after, .swiper-container-rtl .swiper-button-next:after {
        margin-left: auto;
    }
    .swiper-button-prev:after, .swiper-container-rtl .swiper-button-next:after {
        margin-right: auto;
    }
    @media (hover: none), (pointer: coarse) {
        .swiper-button-prev, .swiper-button-next {
            display: none;
        }
    }
</style>

<script type="module">
    /* gallery  */
    var galleryTop = new Swiper(".gallery", {
        spaceBetween: 10,
        grabCursor: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        loop: true,
        loopedSlides: 4,
        // autoplay: {
        //     delay: 5000
        // },
        // other parameters
        on: {
            click: function () {
                /* do something */
            }
        },
        keyboard: {
            enabled: true,
            onlyInViewport: false
        }
    });
    /* thumbs */
    var galleryThumbs = new Swiper(".gallery-thumbs", {
        spaceBetween: 10,
        centeredSlides: true,
        slidesPerView: "auto",
        touchRatio: 0.4,
        slideToClickedSlide: true,
        loop: true,
        loopedSlides: 4,
        keyboard: {
            enabled: true,
            onlyInViewport: false
        }
    });

    /* set conteoller  */
    galleryTop.controller.control = galleryThumbs;
    galleryThumbs.controller.control = galleryTop;
</script>