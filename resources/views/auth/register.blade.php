@extends('layouts.main', ['breadcrumb' => [
    'links' => ['حساب کاربری']
]])

@section('title', 'ثبت نام')

@section('content')
    <!--== Start Account Area Wrapper ==-->
    <section class="section-space">
        <div class="container">
            <div class="row mb-n8">
                <div class="col-lg-6 mb-8">
                    <!--== Start Register Area Wrapper ==-->
                    <div class="my-account-item-wrap">
                        <h3 class="title">ثبت نام</h3>
                        <div class="my-account-form">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group mb-6">
                                    <label for="email">ایمیل <sup>*</sup></label>
                                    <input type="email" name="email" id="email">
                                </div>

                                <div class="form-group mb-6">
                                    <label for="password">{{ __('password') }} <sup>*</sup></label>
                                    <input type="password" name="password" id="password">
                                </div>

                                <div class="form-group mb-6">
                                    <label for="password_confirmation">تکرار {{ __('password') }} <sup>*</sup></label>
                                    <input type="password" name="password_confirmation" id="password_confirmation">
                                </div>

                                <div class="form-group">
                                    {{-- <p class="desc mb-4">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p> --}}
                                    <button class="btn" type="submit">ثبت نام</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--== End Register Area Wrapper ==-->
                </div>
            </div>
        </div>
    </section>
    <!--== End Account Area Wrapper ==-->
@endsection