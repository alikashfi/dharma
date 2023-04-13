<section class="section-space">
    <div class="container">
        <div class="shopping-cart-form table-responsive">
            <form action="#" method="post">
                <table class="table text-center">
                    {{-- <thead> --}}
                    {{-- <tr> --}}
                    {{--     <th class="product-remove">&nbsp;</th> --}}
                    {{--     <th class="product-thumbnail">&nbsp;</th> --}}
                    {{--     <th class="product-name">محصول</th> --}}
                    {{--     <th class="product-price">قیمت</th> --}}
                    {{-- </tr> --}}
                    {{-- </thead> --}}
                    <tbody>
                    @foreach($products as $product)
                        <tr class="tbody-item">
                            <td class="product-remove">
                                <a wire:click.prevent="$emit('removeFromCart', {{ $product->id }})" class="remove" href="javascript:void(0)">×</a>
                            </td>
                            <td class="product-thumbnail">
                                <div class="thumb">
                                    <a href="{{ route('product', $product->slug) }}">
                                        <img src="{{ $product->image }}" width="68" height="84" alt="Image-HasTech">
                                    </a>
                                </div>
                            </td>
                            <td class="product-name">
                                <a class="title" href="{{ route('product', $product->slug) }}">{{ $product->name }}</a>
                            </td>
                            <td class="product-price">
                                <span class="price">{{ $product->priceFormatted }} تومان</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
        <div class="row">
            {{-- <div class="col-12 col-lg-6"> --}}
            {{--     <div class="coupon-wrap"> --}}
            {{--         <h4 class="title">Coupon</h4> --}}
            {{--         <p class="desc">Enter your coupon code if you have one.</p> --}}
            {{--         <input type="text" class="form-control" placeholder="Coupon code"> --}}
            {{--         <button type="button" class="btn-coupon">Apply coupon</button> --}}
            {{--     </div> --}}
            {{-- </div> --}}
            <div class="col-12 col-lg-12">
                <div class="cart-totals-wrap">
                    <h2 class="title">صورتحساب</h2>
                    <table>
                        <tbody>
                        <tr class="cart-subtotal">
                            <th class="text-end">جمع سبد خرید</th>
                            <td>
                                <span class="amount">{{ number_format($products->sum('price')) }} تومان</span>
                            </td>
                        </tr>
                        <tr class="shipping-totals">
                            <th class="text-end">هزینه ارسال</th>
                            <td>
                                @foreach($shippings as $shipping)
                                    <ul class="shipping-list">
                                        <li class="radio">
                                            <input wire:model="shippingId" type="radio" name="shippingId" id="radio{{ $shipping->id }}" value="{{ $shipping->id }}" checked>
                                            <label for="radio{{ $shipping->id }}">{{ $shipping->name }}: <span>{{ number_format($shipping->price) }} تومان</span></label>
                                        </li>
                                    </ul>
                                @endforeach
                            </td>
                        </tr>
                        <tr class="order-total">
                            <th class="text-end">قیمت کل</th>
                            <td>
                                <span class="amount">{{ number_format($products->sum('price') + $selectedShipping->price) }} تومان</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="text-end">
                        <a href="{{ route('checkout') }}" class="checkout-button">برو به پرداخت</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>