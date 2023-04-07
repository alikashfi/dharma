@extends('layouts.main', ['breadcrumb' => [
    'links' => ['سبد خرید']
]])

@section('title', 'سبد خرید')

@section('content')
    <!--== Start Product Area Wrapper ==-->
    @livewire('cart-page')
    <!--== End Product Area Wrapper ==-->
@endsection

{{--@push('style')--}}
{{--    <link rel="stylesheet" href="/assets/css/plugins/range-slider.css">--}}
{{--@endpush--}}

{{--@push('script')--}}
{{--    <script src="/assets/js/plugins/range-slider.js"></script>--}}
{{--@endpush--}}