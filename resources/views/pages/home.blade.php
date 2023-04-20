@extends('layouts.main'/*, ['header' => 'sticky']*/)

@section('title', $settings->homeTitle)
@section('description', $settings->homeDescription)

@section('content')

    @include('partials.page-categories')

    <!--== Start Product Area Wrapper ==-->
    <section class="section-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title">جدید ترین محصولات</h2>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                    </div>
                </div>
            </div>
            <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
                @foreach($products as $product)
                    @include('partials.product-item', ['classes' => 'col-6 col-lg-4 mb-4 mb-sm-9', 'product' => $product])
                @endforeach
            </div>
        </div>
    </section>
    <!--== End Product Area Wrapper ==-->

    <!--== Start Product Banner Area Wrapper ==-->
    <section>
        <div class="container">
            <div class="row">
                @for($i = 1; $i <= 3; $i++)
                    <div class="col-sm-6 col-lg-4 mt-sm-0 mt-6">
                        <!--== Start Product Category Item ==-->
                        <span class="product-banner-item">
                            <img src="{{ url("images/$i.jpg") }}" width="370" height="370" alt="Image-HasTech">
                        </span>
                        <!--== End Product Category Item ==-->
                    </div>
                @endfor
            </div>
        </div>
    </section>
    <!--== End Product Banner Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="section-space pb-0">
        <div class="container">
            <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
                @foreach($nextProducts as $product)
                    @include('partials.product-item', ['classes' => 'col-6 col-lg-4 mb-4 mb-sm-8', 'product' => $product])
                @endforeach
            </div>
        </div>
    </section>
    <!--== End Product Area Wrapper ==-->

    <!--== Start Blog Area Wrapper ==-->
    {{-- <section class="section-space"> --}}
    {{--     <div class="container"> --}}
    {{--         <div class="row"> --}}
    {{--             <div class="col-12"> --}}
    {{--                 <div class="section-title text-center"> --}}
    {{--                     <h2 class="title">پست های وبلاگ</h2> --}}
    {{--                     <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p> --}}
    {{--                 </div> --}}
    {{--             </div> --}}
    {{--         </div> --}}
    {{--         <div class="row mb-n9"> --}}
    {{--             <div class="col-sm-6 col-lg-4 mb-8"> --}}
    {{--                 <!--== Start Blog Item ==--> --}}
    {{--                 <div class="post-item"> --}}
    {{--                     <a href="blog-details.html" class="thumb"> --}}
    {{--                         <img src="assets/images/blog/1.webp" width="370" height="320" alt="Image-HasTech"> --}}
    {{--                     </a> --}}
    {{--                     <div class="content"> --}}
    {{--                         <a class="post-category" href="blog.html">خیاطی</a> --}}
    {{--                         <h4 class="title"><a href="blog-details.html">آموزش دوخت 2 نوع کیف در خانه.</a></h4> --}}
    {{--                         <ul class="meta"> --}}
    {{--                              --}}{{-- <li class="author-info"><span>By:</span> <a href="blog.html">Tomas De Momen</a></li> --}}
    {{--                             <li class="post-date">اردیبهست 13, 1399</li> --}}
    {{--                         </ul> --}}
    {{--                     </div> --}}
    {{--                 </div> --}}
    {{--                 <!--== End Blog Item ==--> --}}
    {{--             </div> --}}
    {{--             <div class="col-sm-6 col-lg-4 mb-8"> --}}
    {{--                 <!--== Start Blog Item ==--> --}}
    {{--                 <div class="post-item"> --}}
    {{--                     <a href="blog-details.html" class="thumb"> --}}
    {{--                         <img src="assets/images/blog/2.webp" width="370" height="320" alt="Image-HasTech"> --}}
    {{--                     </a> --}}
    {{--                     <div class="content"> --}}
    {{--                         <a class="post-category post-category-two" data-bg-color="#A49CFF" href="blog.html">معرفی</a> --}}
    {{--                         <h4 class="title"><a href="blog-details.html">معرفی بهترین فلان و بیسار.</a></h4> --}}
    {{--                         <ul class="meta"> --}}
    {{--                              --}}{{-- <li class="author-info"><span>By:</span> <a href="blog.html">Tomas De Momen</a></li> --}}
    {{--                             <li class="post-date">بهمن 13, 1378</li> --}}
    {{--                         </ul> --}}
    {{--                     </div> --}}
    {{--                 </div> --}}
    {{--                 <!--== End Blog Item ==--> --}}
    {{--             </div> --}}
    {{--             <div class="col-sm-6 col-lg-4 mb-8"> --}}
    {{--                 <!--== Start Blog Item ==--> --}}
    {{--                 <div class="post-item"> --}}
    {{--                     <a href="blog-details.html" class="thumb"> --}}
    {{--                         <img src="assets/images/blog/3.webp" width="370" height="320" alt="Image-HasTech"> --}}
    {{--                     </a> --}}
    {{--                     <div class="content"> --}}
    {{--                         <a class="post-category post-category-three" data-bg-color="#9CDBFF" href="blog.html">پوشاک</a> --}}
    {{--                         <h4 class="title"><a href="blog-details.html">چه لباس هایی برای فلان بیسار.</a></h4> --}}
    {{--                         <ul class="meta"> --}}
    {{--                              --}}{{-- <li class="author-info"><span>By:</span> <a href="blog.html">Tomas De Momen</a></li> --}}
    {{--                             <li class="post-date">دی 13, 1387</li> --}}
    {{--                         </ul> --}}
    {{--                     </div> --}}
    {{--                 </div> --}}
    {{--                 <!--== End Blog Item ==--> --}}
    {{--             </div> --}}
    {{--         </div> --}}
    {{--     </div> --}}
    {{-- </section> --}}
    <!--== End Blog Area Wrapper ==-->

    <!--== Start News Letter Area Wrapper ==-->
    <section class="section-space pt-0 mt-10">
        <div class="container">
            <div class="newsletter-content-wrap" data-bg-img="assets/images/photos/instagram-background.jpg">
                <div class="newsletter-content">
                    <div class="section-title mb-0">
                        <h2 class="title">اینستاگرام دارما</h2>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ می باشد.</p>
                    </div>
                </div>
                <div class="newsletter-form">
                    <a href="{{ $settings->instagramLink }}" class="btn d-flex align-items-center justify-content-center ighomebutton" style="width: 400px; letter-spacing: inherit;" type="submit">
                        <i class="fa fa-instagram fs-3 ms-3"></i>
                        <span>{{ $settings->instagramBox }}</span>
                    </a>
                    <form>
                        {{-- <input type="email" class="form-control" placeholder="enter your email"> --}}
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--== End News Letter Area Wrapper ==-->
@endsection