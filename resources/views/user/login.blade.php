@extends('layouts.main', ['breadcrumb' => [
    'links' => ['حساب کاربری'],
    'title' => 'حساب کاربری'
]])

@section('title', 'ورود')

@section('content')

    <!--== Start Account Area Wrapper ==-->
    <section class="section-space">
        <div class="container">
            <div class="row mb-n8">
                <div class="col-lg-6 mb-8">
                    <!--== Start Login Area Wrapper ==-->
                    <div class="my-account-item-wrap">
                        @include('partials.flash')
                        <h3 class="title">ورود</h3>
                        <div class="my-account-form">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-6">
                                    <label for="login_username">ایمیل <sup>*</sup></label>
                                    <input type="email" name="email" id="login_username">
                                </div>

                                <div class="form-group mb-6">
                                    <label for="login_pwsd">{{ __('password') }} <sup>*</sup></label>
                                    <input type="password" name="password" id="login_pwsd">
                                </div>

                                <div class="form-group d-flex align-items-center mb-14">
                                    <button class="btn" type="submit">ورود</button>

                                    <div class="form-check me-3">
                                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                        <label class="form-check-label" for="remember">مرا به خاطر بسپار</label>
                                    </div>
                                </div>
                                <a class="lost-password" href="my-account.html">پسورد خود را فراموش کرده اید?</a>
                            </form>
                        </div>
                    </div>
                    <!--== End Login Area Wrapper ==-->
                </div>
            </div>
        </div>
    </section>
    <!--== End Account Area Wrapper ==-->
@endsection