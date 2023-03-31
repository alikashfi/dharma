@extends('layouts.user-panel')

@section('panel')

    <div class="tab-pane fade show active">
        <div class="myaccount-content">
            <h3>داشبورد</h3>
            <div class="welcome">
                <p>سلام, <strong>{{ auth()->user()->fullname }}</strong></p>
            </div>
            <p>شما میتوانید از پنل کاربری، وضعیت سفارش های خود را ببینید.</p>
        </div>
    </div>

@endsection