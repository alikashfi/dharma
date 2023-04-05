<div class="{{ $classes ?? 'col-6 col-lg-4 col-xl-3 mb-4 mb-sm-8' }}">
    <!--== Start Product Item ==-->
    <div class="product-item product-st3-item">
        <div class="product-thumb">
            <a class="d-block" href="{{ route('product', $product->slug) }}">
                <img src="{{ $product->thumbImage }}" class="{{ $product->is_available ?: 'product-item-image-inavailable' }}" width="370" height="450" alt="Image-HasTech">
            </a>
            @if ( ! $product->is_available)
                <span class="flag-new">ناموجود</span>
            @endif
            <div class="product-action">
                {{-- <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal"> --}}
                {{--     <i class="fa fa-expand"></i> --}}
                {{-- </button> --}}

                {{-- @livewire('add-to-cart', ['productId' => $product->id]) --}}

                <div class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                     data-bs-target="#action-CartAddModal">
                    <span onclick="Livewire.emit('addToCart', {{ $product->id }})">افزودن به سبد</span>
                </div>

                {{-- <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal"> --}}
                {{--     <i class="fa fa-heart-o"></i> --}}
                {{-- </button> --}}
            </div>
        </div>
        <div class="product-info">
            {{-- <div class="product-rating"> --}}
            {{--     <div class="rating"> --}}
            {{--         <i class="fa fa-star-o"></i> --}}
            {{--         <i class="fa fa-star-o"></i> --}}
            {{--         <i class="fa fa-star-o"></i> --}}
            {{--         <i class="fa fa-star-o"></i> --}}
            {{--         <i class="fa fa-star-half-o"></i> --}}
            {{--     </div> --}}
            {{--     <div class="reviews">150 reviews</div> --}}
            {{-- </div> --}}
            <h4 class="title"><a href="{{ route('product', $product->slug) }}">{{ $product->name }}</a></h4>
            <div class="prices">
                <span class="price">{{ $product->priceFormatted }}</span>
                <span class="price">تومان</span>
                {{-- <span class="price-old">300.00</span> --}}
            </div>
        </div>
        <div class="product-action-bottom">
            {{-- <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" --}}
            {{--         data-bs-target="#action-QuickViewModal"> --}}
            {{--     <i class="fa fa-expand"></i> --}}
            {{-- </button> --}}
            {{-- <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" --}}
            {{--         data-bs-target="#action-WishlistModal"> --}}
            {{--     <i class="fa fa-heart-o"></i> --}}
            {{-- </button> --}}
            <button onclick="Livewire.emit('addToCart', {{ $product->id }})" type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal"
                    data-bs-target="#action-CartAddModal">
                <span>افزودن به سبد</span>
            </button>
        </div>
    </div>
    <!--== End prPduct Item ==-->
</div>