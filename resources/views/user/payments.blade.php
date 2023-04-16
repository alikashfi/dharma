@extends('layouts.user-panel', ['breadcrumb' => [
    'links' => [
        __('user-panel') => route('user.dashboard'),
        'پرداخت ها',
    ]
]])

@section('title', 'پرداخت ها')

@section('panel')

    <div class="tab-pane fade show active">
        <div class="myaccount-content">
            <h3>پرداخت ها</h3>
            <div class="myaccount-table table-responsive text-center">
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th>شناسه</th>
                         <th>وضعیت</th>
                         <th>قیمت</th>
                         <th>تاریخ</th>
                         <th>جزئیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                             <td>
                                <span class="badge rounded-pill {{ $payment->is_paid ? 'bg-success' : 'bg-danger' }}">
                                    {{ $payment->is_paid ? 'موفق' : 'ناموفق' }}
                                </span>
                             </td>
                             <td>{{ number_format($payment->order->price) }}</td>
                             <td>{{ $payment->created_at }}</td>
                            <td><a href="{{ route('user.payment-details', $payment->id) }}" class="check-btn sqr-btn ">جزئیات</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection