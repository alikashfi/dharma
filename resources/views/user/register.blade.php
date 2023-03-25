@extends('layouts.main')

@section('content')
    @include('partials.breadcrumbs', [
        'links' => ['حساب کاربری'],
        'title' => 'حساب کاربری'
    ])

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
                                    <label for="register_username">ایمیل <sup>*</sup></label>
                                    <input type="email" name="email" id="register_username">
                                </div>

                                <div class="form-group mb-6">
                                    <label for="register_pwsd">پسورد <sup>*</sup></label>
                                    <input type="password" name="password" id="register_pwsd">
                                </div>

                                <div class="form-group mb-6">
                                    <label for="register_pwsd">تکرار پسورد <sup>*</sup></label>
                                    <input type="password" name="password_confirmation" id="register_pwsd">
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