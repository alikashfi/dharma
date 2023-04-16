@extends('layouts.user-panel', ['breadcrumb' => [
    'links' => [
        'پرداخت ها' => route('user.payments'),
        'جزئیات پرداخت',
    ]
]])

@section('title', 'جزئیات پرداخت')

@section('panel')

    <div class="tab-pane fade show active">
        <div class="myaccount-content">
            <h3>جزئیات پرداخت</h3>
            <table class="table table-sm table-borderless">
                <tbody>
                    <tr>
                        <td>تراکنش:</td>
                        <td>{{ $payment->trans1 }}</td>
                    </tr>
                    <tr>
                        <td>کد رهگیری:</td>
                        <td>{{ $payment->trans2 }}</td>
                    </tr>
                    <tr>
                        <td>پاسخ بانک:</td>
                        <td>{{ $payment->result }}</td>
                    </tr>
                    <tr>
                        <td>وضعیت:</td>
                        <td>
                            <span class="badge rounded-pill {{ $payment->is_paid ? 'bg-success' : 'bg-danger' }}">
                                {{ $payment->is_paid ? 'موفق' : 'ناموفق' }}
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection