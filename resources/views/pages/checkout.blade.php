@extends('layouts.main', ['breadcrumb' => [
    'links' => [
        'سبد خرید' => route('cart'),
        'پرداخت'
    ]
]])

@section('title', 'صفحه پرداخت')

@section('content')
    <!--== Start Shopping Checkout Area Wrapper ==-->
    <section class="shopping-checkout-wrap section-space">
        <div class="container">
            <div class="row">
                @include('partials.flash')
                <div class="col-lg-6">
                    <!--== Start Billing Accordion ==-->
                    <div class="checkout-billing-details-wrap">
                        <h2 class="title">مشخصات</h2>
                        <div class="billing-form-wrap">
                            <form action="{{ route('order') }}" method="post" id="checkout-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-checkout-input label="نام" name="fname"/>
                                    </div>
                                    <div class="col-md-6">
                                        <x-checkout-input label="نام خانوادگی" name="lname"/>
                                    </div>
                                    <div class="col-md-12">
                                        <x-checkout-input label="آدرس" name="address"/>
                                    </div>
                                    <div class="col-md-12">
                                        <x-checkout-input label="کد پستی" name="postal_code"/>
                                    </div>
                                    <div class="col-md-12">
                                        <x-checkout-input label="شماره تلفن" name="phone"/>
                                    </div>
                                    @if(auth()->user()->hasDetails())
                                        <p>میتوانید مشخصات را از
                                            <a href="{{ route('user.details') }}" class="text-primary">تنظیمات {{ __('user-panel') }}</a>
                                            تغییر دهید.
                                        </p>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="form-group mb-0">
                                            <label for="comment">یادداشت خرید</label>
                                            <textarea name="comment" id="comment" class="form-control" placeholder="توضیحات درباره خرید یا ارسال؟">{{ old('comment') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--== End Billing Accordion ==-->
                </div>
                <div class="col-lg-6">
                    <!--== Start Order Details Accordion ==-->
                    <div class="checkout-order-details-wrap">
                        <div class="order-details-table-wrap table-responsive">
                            <h2 class="title mb-25">صورتحساب</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-name">محصول</th>
                                        <th class="product-total">قیمت</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    @foreach($products as $product)
                                        <tr class="cart-item">
                                            <td class="product-name">{{ $product->name }}</td>
                                            <td class="product-total">{{ $product->priceFormatted }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="table-foot">
                                    <tr class="cart-subtotal">
                                        <th>جمع سبد خرید</th>
                                        <td>{{ number_format($products->sum('price')) }}</td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>هزینه ارسال</th>
                                        <td>{{ number_format($shipping->price) }}</td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>جمع کل</th>
                                        <td>{{ number_format($products->sum('price') + $shipping->price) }} تومان</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="shop-payment-method">
                                <div id="PaymentMethodAccordion">
                                    <div class="card">
                                        <div class="card-header" id="check_payments">
                                            <h5 class="title " data-bs-toggle="collapse" data-bs-target="#itemOne" aria-controls="itemOne" aria-expanded="true">درگاه Pay.ir</h5>
                                        </div>
                                        <div id="itemOne" class="collapse show" aria-labelledby="check_payments" data-bs-parent="#PaymentMethodAccordion">
                                            <div class="card-body">
                                                <p>پرداخت از طریق درگاه پرداخت امن پی دات آی آر</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="p-text">از اطلاعات شما فقط در جهت ارسال محصولات برایتان استفاده خواهد شد. برای توضیحات بیشتر، <a href="{{ route('page', 'privacy-policy') }}">قوانین حریم خصوصی</a> را بخوانید.</p>
                                <div class="agree-policy">
                                    <div class="custom-control custom-checkbox">
                                        <input name="privacy_policy" type="checkbox" form="checkout-form" id="privacy_policy" class="custom-control-input visually-hidden" required>
                                        <label for="privacy_policy" class="custom-control-label">قوانین را مطالعه کردم و با آن موافقم <span class="required">*</span></label>
                                    </div>
                                </div>
                                <button onclick="document.querySelector('#checkout-form').submit()" class="btn-place-order btn-order">پرداخت و ثبت سفارش</button>
                            </div>
                        </div>
                    </div>
                    <!--== End Order Details Accordion ==-->
                </div>
            </div>
        </div>
    </section>
    <!--== End Shopping Checkout Area Wrapper ==-->
@endsection

{{--@push('style')--}}
{{--    <link rel="stylesheet" href="/assets/css/plugins/range-slider.css">--}}
{{--@endpush--}}

{{--@push('script')--}}
{{--    <script src="/assets/js/plugins/range-slider.js"></script>--}}
{{--@endpush--}}