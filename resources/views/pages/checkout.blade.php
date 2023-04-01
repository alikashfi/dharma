@extends('layouts.main')

@section('content')

    @include('partials.breadcrumb', [
        'links' => [
            'سبد خرید' => route('cart'),
            'پرداخت'
        ]
    ])


    <!--== Start Shopping Checkout Area Wrapper ==-->
    <section class="shopping-checkout-wrap section-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!--== Start Billing Accordion ==-->
                    <div class="checkout-billing-details-wrap">
                        <h2 class="title">مشخصات</h2>
                        <div class="billing-form-wrap">
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="f_name">نام <abbr class="required" title="required">*</abbr></label>
                                            <input id="f_name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="l_name">نام خانوادگی <abbr class="required" title="required">*</abbr></label>
                                            <input id="l_name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="com_name">آدرس <abbr class="required" title="required">*</abbr></label>
                                            <input id="com_name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="pz-code">کد پستی <abbr class="required" title="required">*</abbr></label>
                                            <input id="pz-code" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="phone">شماره تلفن <abbr class="required" title="required">*</abbr></label>
                                            <input id="phone" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <p>میتوانید مشخصات را از
                                        <a href="{{ route('user.settings') }}" class="text-primary">تنظیمات {{ __('user-panel') }}</a>
                                        تغییر دهید.</p>
                                    <div class="col-md-12">
                                        <div class="form-group mb-0">
                                            <label for="order-notes">یادداشت خرید</label>
                                            <textarea id="order-notes" class="form-control" placeholder="توضیحات درباره خرید یا ارسال؟"></textarea>
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
                                        <td>{{ number_format(20000) }}</td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>جمع کل</th>
                                        <td>{{ number_format($products->sum('price') + 20000) }} تومان</td>
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
                                <p class="p-text">از اطلاعات شما فقط در جهت ارسال کالا برای شما استفاده خواهد شد. برای توضیحات بیشتر، <a href="#/">قوانین حریم خصوصی</a> را بخوانید.</p>
                                <div class="agree-policy">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="privacy" class="custom-control-input visually-hidden">
                                        <label for="privacy" class="custom-control-label">قوانین سایت را خواندم و با آن موافقم <span class="required">*</span></label>
                                    </div>
                                </div>
                                <a href="account.html" class="btn-place-order">پرداخت و ثبت سفارش</a>
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