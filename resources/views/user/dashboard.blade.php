@extends('layouts.user-panel', ['breadcrumb' => [
    'links' => [
        __('user-panel'),
    ]
]])

@section('title', 'داشبورد')

@section('panel')

    <div class="tab-pane fade show active">
        <div class="myaccount-content">
            <h3>داشبورد</h3>
            <div class="welcome">
                <p>سلام, <strong class="text-black">{{ auth()->user()->fullname }}</strong></p>
            </div>
            <p>شما میتوانید از پنل کاربری، <a href="{{ route('user.orders') }}" class="text-primary">وضعیت سفارش های خود را ببینید.</a></p>
        </div>
    </div>

@endsection