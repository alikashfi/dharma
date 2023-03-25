@extends('layouts.main')

@section('content')

    @include('partials.breadcrumb', [
        'links' => [$product->category->name, $product->name],
        'title' => $product->name
    ])

    <!--== Start Product Details Area Wrapper ==-->
    <section class="section-space pt-3">
        <div class="container">
            <div class="row product-details">
                <div class="col-lg-6">
                    {{-- <div class="product-details-thumb"> --}}
                    {{--     <img src="/assets/images/shop/product-details/4.webp" width="570" height="693" alt="Image"> --}}
                    {{--     <span class="flag-new">new</span> --}}
                    {{-- </div> --}}

                    <div>
                        <!-- top gallery -->
                        <main class="swiper gallery">
                            <div class="swiper-wrapper">
                                @foreach($product->media as $image)
                                    <div class="swiper-slide">
                                        <div class="swiper-zoom-container">
                                            <img src="{{ $image->getUrl() }}">
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
                        <h5 class="product-details-collection">some text</h5>
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
                        <p class="mb-7">{{ $product->description }}</p>
                        <div class="product-details-action">
                            <h4 class="price">{{ $product->priceFormatted }} تومان</h4>
                            <div class="product-details-cart-wishlist">
                                {{-- <button type="button" class="btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal"><i class="fa fa-heart-o"></i></button> --}}
                                <button type="button" class="btn ps-5 me-4" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                    افزودن به سبد خرید
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="nav product-details-nav" id="product-details-nav-tab" role="tablist">
                        <button class="nav-link" id="specification-tab" data-bs-toggle="tab" data-bs-target="#specification" type="button"
                                role="tab" aria-controls="specification" aria-selected="false">Specification
                        </button>
                        <button class="nav-link active" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button"
                                role="tab" aria-controls="review" aria-selected="true">Review
                        </button>
                    </div>
                    <div class="tab-content" id="product-details-nav-tabContent">
                        <div class="tab-pane" id="specification" role="tabpanel" aria-labelledby="specification-tab">
                            <ul class="product-details-info-wrap">
                                <li><span>Weight</span>
                                    <p>250 g</p>
                                </li>
                                <li><span>Dimensions</span>
                                    <p>10 x 10 x 15 cm</p>
                                </li>
                                <li><span>Materials</span>
                                    <p>60% cotton, 40% polyester</p>
                                </li>
                                <li><span>Other Info</span>
                                    <p>American heirloom jean shorts pug seitan letterpress</p>
                                </li>
                            </ul>

                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius velit corporis quo voluptate culpa soluta, esse
                                accusamus, sunt quia omnis amet temporibus sapiente harum quam itaque libero tempore. Ipsum, ducimus.
                                lorem</p>
                        </div>

                        <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                            <!--== Start Reviews Content Item ==-->
                            <div class="product-review-item">
                                <div class="product-review-top">
                                    <div class="product-review-thumb">
                                        <img src="assets/images/shop/product-details/comment1.webp" alt="Images">
                                    </div>
                                    <div class="product-review-content">
                                        <span class="product-review-name">Tomas Doe</span>
                                        <span class="product-review-designation">Delveloper</span>
                                        <div class="product-review-icon">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra amet, sodales faucibus
                                    nibh. Vivamus amet potenti ultricies nunc gravida duis. Nascetur scelerisque massa sodales.</p>
                                <button type="button" class="review-reply"><i class="fa fa fa-undo"></i></button>
                            </div>
                            <!--== End Reviews Content Item ==-->

                            <!--== Start Reviews Content Item ==-->
                            <div class="product-review-item product-review-reply">
                                <div class="product-review-top">
                                    <div class="product-review-thumb">
                                        <img src="assets/images/shop/product-details/comment2.webp" alt="Images">
                                    </div>
                                    <div class="product-review-content">
                                        <span class="product-review-name">Tomas Doe</span>
                                        <span class="product-review-designation">Delveloper</span>
                                        <div class="product-review-icon">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra amet, sodales faucibus
                                    nibh. Vivamus amet potenti ultricies nunc gravida duis. Nascetur scelerisque massa sodales.</p>
                                <button type="button" class="review-reply"><i class="fa fa fa-undo"></i></button>
                            </div>
                            <!--== End Reviews Content Item ==-->

                            <!--== Start Reviews Content Item ==-->
                            <div class="product-review-item mb-0">
                                <div class="product-review-top">
                                    <div class="product-review-thumb">
                                        <img src="assets/images/shop/product-details/comment3.webp" alt="Images">
                                    </div>
                                    <div class="product-review-content">
                                        <span class="product-review-name">Tomas Doe</span>
                                        <span class="product-review-designation">Delveloper</span>
                                        <div class="product-review-icon">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra amet, sodales faucibus
                                    nibh. Vivamus amet potenti ultricies nunc gravida duis. Nascetur scelerisque massa sodales.</p>
                                <button type="button" class="review-reply"><i class="fa fa fa-undo"></i></button>
                            </div>
                            <!--== End Reviews Content Item ==-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product-reviews-form-wrap">
                        <h4 class="product-form-title">Leave a replay</h4>
                        <div class="product-reviews-form">
                            <form action="#">
                                <div class="form-input-item">
                                    <textarea class="form-control" placeholder="Enter you feedback"></textarea>
                                </div>
                                <div class="form-input-item">
                                    <input class="form-control" type="text" placeholder="Full Name">
                                </div>
                                <div class="form-input-item">
                                    <input class="form-control" type="email" placeholder="Email Address">
                                </div>
                                <div class="form-input-item">
                                    <div class="form-ratings-item">
                                        <select id="product-review-form-rating-select" class="select-ratings">
                                            <option value="1">01</option>
                                            <option value="2">02</option>
                                            <option value="3">03</option>
                                            <option value="4">04</option>
                                            <option value="5">05</option>
                                        </select>
                                        <span class="title">Provide Your Ratings</span>
                                        <div class="product-ratingsform-form-wrap">
                                            <div class="product-ratingsform-form-icon">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div id="product-review-form-rating" class="product-ratingsform-form-icon-fill">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="reviews-form-checkbox">
                                        <input class="form-check-input" type="checkbox" value="" id="ReviewsFormCheckbox" checked>
                                        <label class="form-check-label" for="ReviewsFormCheckbox">Provide ratings anonymously.</label>
                                    </div>
                                </div>
                                <div class="form-input-item mb-0">
                                    <button type="submit" class="btn">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Product Details Area Wrapper ==-->

    <!--== Start Product Banner Area Wrapper ==-->
    <div class="container">
        <!--== Start Product Category Item ==-->
        <a href="product.html" class="product-banner-item">
            <img src="assets/images/shop/banner/7.webp" width="1170" height="240" alt="Image-HasTech">
        </a>
        <!--== End Product Category Item ==-->
    </div>
    <!--== End Product Banner Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="section-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="title">Related Products</h2>
                        <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus
                            venenatis</p>
                    </div>
                </div>
            </div>
            <div class="row mb-n10">
                <div class="col-12">
                    <div class="swiper related-product-slide-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide mb-10">
                                <!--== Start Product Item ==-->
                                <div class="product-item product-st2-item">
                                    <div class="product-thumb">
                                        <a class="d-block" href="product-details.html">
                                            <img src="assets/images/shop/8.webp" width="370" height="450" alt="Image-HasTech">
                                        </a>
                                        <span class="flag-new">new</span>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-rating">
                                            <div class="rating">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                            <div class="reviews">150 reviews</div>
                                        </div>
                                        <h4 class="title"><a href="product-details.html">Readable content DX22</a></h4>
                                        <div class="prices">
                                            <span class="price">$210.00</span>
                                            <span class="price-old">300.00</span>
                                        </div>
                                        <div class="product-action">
                                            <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                                    data-bs-target="#action-CartAddModal">
                                                <span>Add to cart</span>
                                            </button>
                                            <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal"
                                                    data-bs-target="#action-QuickViewModal">
                                                <i class="fa fa-expand"></i>
                                            </button>
                                            <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal"
                                                    data-bs-target="#action-WishlistModal">
                                                <i class="fa fa-heart-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!--== End prPduct Item ==-->
                            </div>
                            <div class="swiper-slide mb-10">
                                <!--== Start Product Item ==-->
                                <div class="product-item product-st2-item">
                                    <div class="product-thumb">
                                        <a class="d-block" href="product-details.html">
                                            <img src="assets/images/shop/7.webp" width="370" height="450" alt="Image-HasTech">
                                        </a>
                                        <span class="flag-new">new</span>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-rating">
                                            <div class="rating">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                            <div class="reviews">150 reviews</div>
                                        </div>
                                        <h4 class="title"><a href="product-details.html">Readable content DX22</a></h4>
                                        <div class="prices">
                                            <span class="price">$210.00</span>
                                            <span class="price-old">300.00</span>
                                        </div>
                                        <div class="product-action">
                                            <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                                    data-bs-target="#action-CartAddModal">
                                                <span>Add to cart</span>
                                            </button>
                                            <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal"
                                                    data-bs-target="#action-QuickViewModal">
                                                <i class="fa fa-expand"></i>
                                            </button>
                                            <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal"
                                                    data-bs-target="#action-WishlistModal">
                                                <i class="fa fa-heart-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!--== End prPduct Item ==-->
                            </div>
                            <div class="swiper-slide mb-10">
                                <!--== Start Product Item ==-->
                                <div class="product-item product-st2-item">
                                    <div class="product-thumb">
                                        <a class="d-block" href="product-details.html">
                                            <img src="assets/images/shop/5.webp" width="370" height="450" alt="Image-HasTech">
                                        </a>
                                        <span class="flag-new">new</span>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-rating">
                                            <div class="rating">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                            <div class="reviews">150 reviews</div>
                                        </div>
                                        <h4 class="title"><a href="product-details.html">Readable content DX22</a></h4>
                                        <div class="prices">
                                            <span class="price">$210.00</span>
                                            <span class="price-old">300.00</span>
                                        </div>
                                        <div class="product-action">
                                            <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                                                    data-bs-target="#action-CartAddModal">
                                                <span>Add to cart</span>
                                            </button>
                                            <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal"
                                                    data-bs-target="#action-QuickViewModal">
                                                <i class="fa fa-expand"></i>
                                            </button>
                                            <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal"
                                                    data-bs-target="#action-WishlistModal">
                                                <i class="fa fa-heart-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!--== End prPduct Item ==-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Product Area Wrapper ==-->
@endsection

<style>
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


{{-- <section class="section-space"> --}}
{{--     <div class="container"> --}}
{{--         <div class="row product-details"> --}}
{{--             <div class="col-lg-6"> --}}
{{--                 <div class="container"> --}}
{{--                     <!-- top gallery --> --}}
{{--                     <main class="swiper gallery"> --}}
{{--                         <div class="swiper-wrapper"> --}}
{{--                             <div class="swiper-slide"> --}}
{{--                                 <div class="swiper-zoom-container"> --}}
{{--                                     <img src="https://picsum.photos/id/14/1600/1000"> --}}
{{--                                 </div> --}}
{{--                                 <div>Image 1</div> --}}
{{--                             </div> --}}
{{--                             <div class="swiper-slide"> --}}
{{--                                 <div class="swiper-zoom-container"> --}}
{{--                                     <img src="https://picsum.photos/id/695/1600/1000"> --}}
{{--                                 </div> --}}
{{--                                 <div>Image 2</div> --}}
{{--                             </div> --}}
{{--                             <div class="swiper-slide"> --}}
{{--                                 <div class="swiper-zoom-container"> --}}
{{--                                     <img src="https://picsum.photos/id/12/1600/1000"> --}}
{{--                                 </div> --}}
{{--                                 <div>Image 3</div> --}}
{{--                             </div> --}}
{{--                             <div class="swiper-slide"> --}}
{{--                                 <div class="swiper-zoom-container"> --}}
{{--                                     <img src="https://picsum.photos/id/119/1600/1000"> --}}
{{--                                 </div> --}}
{{--                                 <div>Image 4</div> --}}
{{--                             </div> --}}
{{--                         </div> --}}
{{--                         <!-- Add Arrows --> --}}
{{--                         <div title="next" class="swiper-button-next swiper-button-white"></div> --}}
{{--                         <div title="prev" class="swiper-button-prev swiper-button-white"></div> --}}
{{--                     </main> --}}

{{--                     <!-- thumbs --> --}}
{{--                     <nav class="swiper gallery-thumbs"> --}}
{{--                         <div class="swiper-wrapper"> --}}
{{--                             <div class="swiper-slide"> --}}
{{--                                 <img src="https://picsum.photos/id/14/600/300"> --}}
{{--                                 <div>thumbs 1</div> --}}
{{--                             </div> --}}
{{--                             <div class="swiper-slide"> --}}
{{--                                 <div class="swiper-zoom-container"> --}}

{{--                                     <img src="https://picsum.photos/id/695/300/200"> --}}
{{--                                 </div> --}}
{{--                                 <div>thumbs 2</div> --}}
{{--                             </div> --}}
{{--                             <div class="swiper-slide"> --}}
{{--                                 <img src="https://picsum.photos/id/12/400/400"> --}}
{{--                                 <div>thumbs 3</div> --}}
{{--                             </div> --}}
{{--                             <div class="swiper-slide"> --}}
{{--                                 <img src="https://picsum.photos/id/119/300/200"> --}}
{{--                                 <div>thumbs 4</div> --}}
{{--                             </div> --}}
{{--                         </div> --}}
{{--                     </nav> --}}

{{--                 </div> --}}
{{--             </div> --}}
{{--         </div> --}}
{{--     </div> --}}
{{-- </section> --}}