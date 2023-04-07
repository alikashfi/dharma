<ul class="aside-cart-product-list">
    @forelse($products as $product)
        <li class="aside-product-list-item">
            <a wire:click.prevent="removeFromCart({{ $product->id }})" class="remove start-0">×</a>
            <a href="product-details.html">
                <img src="{{ $product->thumbImage }}" class="float-end me-0 ms-4" alt="عکس {{ $product->name }}">
                <span class="product-title">{{ $product->name }}</span>
            </a>
            <span class="product-price">{{ $product->priceFormatted }} تومان</span>
        </li>
    @empty
        <span class="product-price">سبد خرید شما خالیست!</span>
    @endforelse
    @if (count($products))
        <p class="cart-total"><span>قیمت کل:</span><span class="me-2">{{ number_format($products->sum('price')) }} تومان</span></p>
    @endif
</ul>