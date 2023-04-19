@extends('layouts.main', ['breadcrumb' => [
    'links' => ['فراموشی ' . __('password')]
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
                        <h3 class="title">فراموشی {{ __('password') }}</h3>
                        <p>پسورد خود را فراموش کردید؟</p>
                        <p>ایمیلی که با آن ثبت نام کردید را وارد کنید. یک لینک برای انتخاب پسورد جدید برای شما ایمیل میکنیم.</p>
                        <div class="my-account-form">
                            <form method="POST" action="{{ route('forgot-password') }}">
                                @csrf

                                <div class="form-group mb-6">
                                    <label for="register_username">ایمیل <sup>*</sup></label>
                                    <input type="email" name="email" id="register_username">
                                </div>

                                <div class="form-group">
                                    <button class="btn" type="submit">ارسال لینک بازیابی</button>
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