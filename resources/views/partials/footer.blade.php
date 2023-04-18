<!--== Start Footer Area Wrapper ==-->
<footer class="footer-area">
    <!--== Start Footer Main ==-->
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="widget-item">
                        <div class="widget-about">
                            <a class="widget-logo" href="index.html">
                                <img src="{{ url('images/logo.jpg') }}" width="95" height="68" alt="Logo">
                            </a>
                            <p class="desc">{{ $settings->footerDescription }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 mt-md-0 mt-9">
                    <div class="widget-item">
                        <h4 class="widget-title">لینک ها</h4>
                        <ul class="widget-nav">
                            <li><a href="{{ route('home') }}">خانه</a></li>
                            <li><a href="{{ route('shop') }}">فروشگاه</a></li>
                            <li><a href="{{ route('cart') }}">سبد خرید</a></li>
                            @auth
                                <li><a href="{{ route('user.dashboard') }}">{{ __('user-panel') }}</a></li>
                                @if (auth()->user()->isAdmin())
                                    <li><a href="{{ route('filament.pages.dashboard') }}">داشبورد ادمین</a></li>
                                @endif
                            @endauth
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mt-lg-0 mt-6">
                    <div class="widget-item">
                        <h4 class="widget-title">شبکه های اجتماعی</h4>
                        <div class="widget-social">
                            @foreach($settings->socials as $social)
                                <a href="{{ $social['link'] }}" target="_blank" rel="noopener">
                                    @empty($social['icon'])
                                        <img src="{{ url("images/social/{$social['image']}") }}" alt="{{ $social['link'] }}" style="width: 28px; max-width: 28px">
                                    @else
                                        <i class="fa fs-2 {{ $social['icon'] }}"></i>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Footer Main ==-->

    <!--== Start Footer Bottom ==-->
    <div class="footer-bottom">
        <div class="container pt-0 pb-0">
            <div class="footer-bottom-content">
                <p class="copyright">
                    © ساخته شده با <i class="fa fa-heart"></i> تمامی حقوق برای <b><a target="_blank" href="https://themeforest.net/user/codecarnival">{{ config('app.name') }} </a></b> محفوظ است.
                </p>
            </div>
        </div>
    </div>
    <!--== End Footer Bottom ==-->
</footer>
<!--== End Footer Area Wrapper ==-->

<style>
    .footer-main .widget-social a {
        margin-left: 2rem !important;
    }
</style>