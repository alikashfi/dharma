@extends('layouts.user-panel', ['breadcrumb' => [
    'links' => [
        __('user-panel') => route('user.dashboard'),
        'سفارشات',
    ]
]])

@section('title', 'سفارشات')

@section('panel')

    <div class="tab-pane fade show active">
        <div class="myaccount-content">
            <h3>سفارشات</h3>
            <div class="myaccount-table table-responsive text-center">
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th>شناسه</th>
                        <th>تاریخ</th>
                        <th>وضعیت</th>
                        <th>قیمت</th>
                        <th>جزئیات</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <span class="badge rounded-pill bg-{{ $order->status->badge }} {{ ! in_array($order->status->badge, ['warning', 'light']) ?: 'text-dark' }}">
                                        @if (in_array($order->status->slug, ['pending', 'failed']))
                                            <a href="{{ route('pay-order', $order->id) }}" style="color: inherit !important;">{{ $order->status->name }}</a>
                                        @else
                                            {{ $order->status->name }}
                                        @endif
                                    </span>
                                </td>
                                <td>{{ $order->price }}</td>
                                <td><a href="{{ route('user.order-details', $order->id) }}" class="check-btn sqr-btn ">جزئیات</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection