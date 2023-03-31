<!--== Start Product Category Area Wrapper ==-->
<section class="section-space pt-3 pb-0">
    <div class="container">
        <div class="row g-3 g-sm-6">
            @foreach($pageCategories as $pcategory)
                <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-lg-0 mt-sm-6 mt-4">
                    <!--== Start Product Category Item ==-->
                    <a href="{{ route('category', $pcategory->slug) }}" class="product-category-item" data-bg-color="{{ $pcategory->color }}">
                        <img class="icon" src="{{ $pcategory->image }}" width="70" height="80" alt="Image-HasTech">
                        <h3 class="title">{{ $pcategory->name }}</h3>
                        {{-- <span class="flag-new">new</span> --}}
                    </a>
                    <!--== End Product Category Item ==-->
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--== End Product Category Area Wrapper ==-->