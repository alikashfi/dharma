@extends('layouts.user-panel')

@section('panel')

    <div class="tab-pane fade show active">
        <div class="myaccount-content">
            <h3>تنظیمات</h3>
            @include('partials.flash')
            <div class="account-details-form">
                <form method="post">
                    @csrf
                    <div class="single-input-item">
                        <label for="email" class="required">ایمیل</label>
                        <input dir="ltr" name="email" type="email" id="email" value="{{ auth()->user()->email }}"/>
                    </div>
                    <fieldset>
                        <legend>Password change</legend>
                        <div class="single-input-item">
                            <label for="current_password" class="required">{{ __('password') }} فعلی</label>
                            <input dir="ltr" name="current_password" type="password" id="current_password"/>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="password" class="required">{{ __('password') }} جدید</label>
                                    <input dir="ltr" name="password" type="password" id="password"/>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <label for="password_confirmation" class="required">تکرار {{ __('password') }} جدید</label>
                                    <input dir="ltr" name="password_confirmation" type="password" id="password_confirmation"/>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="single-input-item">
                        <button class="check-btn sqr-btn">ذخیره</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection