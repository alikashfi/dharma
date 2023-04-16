@extends('layouts.user-panel', ['breadcrumb' => [
    'links' => [
        'سفارشات' => route('user.orders'),
        'جزئیات سفارش',
    ]
]])

@section('title', 'جزئیات سفارش')

@section('panel')

    <div class="tab-pane fade show active">
        <div class="myaccount-content">
            <h3>جزئیات سفارش</h3>
            <table class="table table-sm table-borderless">
                <tbody>
                    <tr>
                        <td>مجموع محصولات:</td>
                        <td>{{ number_format($order->products->sum('price')) }}</td>
                    </tr>
                    <tr>
                        <td>هنزینه ارسال:</td>
                        <td>{{ number_format($order->shipping_price) }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">جمع کل:</td>
                        <td class="fw-bold">{{ number_format($order->price) }}</td>
                    </tr>
                    <tr>
                        <td>وضعیت:</td>
                        <td>
                            <span class="badge rounded-pill {{ $order->is_paid ? 'bg-success' : 'bg-danger' }}">
                                {{ $order->is_paid ? 'پرداخت شده' : 'پرداخت نشده' }}
                            </span>
                            <span class="badge rounded-pill bg-{{ $order->status->badge }} {{ ! in_array($order->status->badge, ['warning', 'light']) ?: 'text-dark' }}">
                                        @if (in_array($order->status->slug, ['pending', 'failed']))
                                    <a href="{{ route('pay-order', $order->id) }}" style="color: inherit !important;">{{ $order->status->name }}</a>
                                @else
                                    {{ $order->status->name }}
                                @endif
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>یادداشت خرید:</td>
                        <td>{{ $order->comment ?? '---' }}</td>
                    </tr>
                </tbody>
            </table>

            <h3>محصولات</h3>
            <div class="myaccount-table table-responsive fs-6">
                <table class="table table-sm">
                    <tbody>
                        @foreach($order->products as $product)
                            <tr>
                                <td><img src="{{ $product->thumbImage }}" alt="عکس {{ $product->name }}" style="max-width: 50px; max-height: 50px"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->priceFormatted }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection