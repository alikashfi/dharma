@extends('layouts.user-panel', ['breadcrumb' => [
    'links' => [
        __('user-panel') => route('user.dashboard'),
        'مشخصات',
    ]
]])

@section('panel')

    <div class="tab-pane fade show active">
        <div class="myaccount-content">
            <h3>مشخصات</h3>
            @include('partials.flash')
            <div class="account-details-form">
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="fname" class="required">نام</label>
                                <input name="fname" type="text" id="fname" value="{{ old('email', auth()->user()->fname) }}"/>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="lname" class="required">نام خانوادگی</label>
                                <input name="lname" type="text" id="lname" value="{{ old('lname', auth()->user()->lname) }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="single-input-item">
                        <label for="address" class="required">آدرس</label>
                        <input name="address" type="text" id="address" value="{{ old('address', auth()->user()->address) }}"/>
                    </div>
                    <div class="single-input-item">
                        <label for="postal_code" class="required">کد پستی</label>
                        <input dir="ltr" name="postal_code" type="text" id="postal_code" value="{{ old('postal_code', auth()->user()->postal_code) }}"/>
                    </div>
                    <div class="single-input-item">
                        <label for="phone" class="required">شماره تلفن</label>
                        <input dir="ltr" name="phone" type="text" id="phone" value="{{ old('phone', auth()->user()->phone) }}"/>
                    </div>
                    <div class="single-input-item">
                        <button class="check-btn sqr-btn">ذخیره</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection