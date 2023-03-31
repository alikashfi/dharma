@extends('layouts.main')

@section('content')

    @include('partials.breadcrumb', [
        'links' => [
            __('shop') => route('shop'),
            $category->name
        ],
        'count' => $products->total()
    ])

    @include('partials.page-categories')

    <!--== Start Product Area Wrapper ==-->
    <section class="section-space">
        <div class="container">
            <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
                @each('partials.product-item', $products, 'product')

                {{ $products/*->onEachSide(1)*/->links('partials.bootstrap-5') }}
            </div>
        </div>
    </section>
    <!--== End Product Area Wrapper ==-->
@endsection

{{--@push('style')--}}
{{--    <link rel="stylesheet" href="/assets/css/plugins/range-slider.css">--}}
{{--@endpush--}}

{{--@push('script')--}}
{{--    <script src="/assets/js/plugins/range-slider.js"></script>--}}
{{--@endpush--}}