<!--== Start Header Wrapper ==-->
<header class="header-area {{ ! isset($header) ?: 'sticky-header header-transparent' }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-5 col-lg-2 col-xl-1">
                <div class="header-logo">
                    <a href="index.html">
                        <img class="logo-main" src="{{ url('images/logo.jpg') }}" width="95" alt="Logo" />
                    </a>
                </div>
            </div>
            <div class="col-lg-7 col-xl-7 d-none d-lg-block">
                <div class="header-navigation ps-7">
                    <ul class="main-nav justify-content-start">
                        <li><a href="{{ route('home') }}">@lang('home')</a></li>
                        <li class="has-submenu position-static"><a href="{{ route('shop') }}">@lang('shop')</a>
                            <ul class="submenu-nav-mega">
                                @foreach($headerCategories->where('parent_id', null) as $category)
                                    <li><a href="{{ route('category', $category->slug) }}" class="mega-title px-3">{{ $category->name }}</a>
                                        <ul>
                                            @foreach($headerCategories->where('parent_id', $category->id) as $category)
                                                <li><a href="{{ route('category', $category->slug) }}" class="px-3">{{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="has-submenu"><a>درباره ما</a>
                            <ul class="submenu-nav">
                                <li><a href="{{ route('about') }}">درباره ما</a></li>
                                <li><a href="{{ route('contact') }}">تماس با ما</a></li>
                                <li><a href="{{ route('faq') }}">سوالات متداول</a></li>
                                <li><a href="{{ route('privacy-policy') }}">قوانین</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ $settings->instagramLink }}">{{ $settings->instagramTitle }}</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-7 col-lg-3 col-xl-4">
                <div class="header-action justify-content-end">
                    <!--== Start Search Icon ==-->
                    <button class="header-action-btn ms-3 ms-md-10" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasSearch" aria-controls="AsideOffcanvasSearch">
                        <span class="icon">
                          <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect class="icon-rect" width="30" height="30" fill="url(#pattern1)"/>
                            <defs>
                              <pattern id="pattern1" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_504:11" transform="scale(0.0333333)"/>
                              </pattern>
                              <image id="image0_504:11" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABiUlEQVRIie2Wu04CQRSGP0G2EUtIbHwA8B3EQisLIcorEInx8hbEZ9DKy6toDI1oAgalNFpDoYWuxZzJjoTbmSXERP7kZDbZ859vdmb27MJcf0gBUAaugRbQk2gBV3IvmDa0BLwA4Zh4BorTACaAU6fwPXAI5IAliTxwBDScvJp4vWWhH0BlTLEEsC+5Fu6lkgNdV/gKDnxHCw2I9rSiNQNV8baBlMZYJtpTn71KAg9SY3dUYn9xezLPgG8P8BdwLteq5X7CzDbnAbXKS42WxtQVUzoGeFlqdEclxXrnhmhhkqR+8KuMqzHA1vumAddl3IwB3pLxVmOyr1NjwKQmURJ4lBp7GmOAafghpg1qdSDeDrCoNReJWmZB4dsAPsW7rYVa1Rx4FbOEw5TEPKmFvgMZX3DCgYeYNniMaQ5piTXghGhPLdTmZ33hYNpem98f/UHRwSxvhqhXx4anMA3/EmhiOlJPJnSBOb3uQcpOE65VhujPpAms/Bu4u+x3swRbeB24mTV4LgB+AFuLedkPkcmmAAAAAElFTkSuQmCC"/>
                            </defs>
                          </svg>
                                </span>
                    </button>
                    <!--== End Search Icon ==-->

                    <!--== Start Cart Icon ==-->
                    <button class="header-action-btn ms-3 ms-md-10" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasCart" aria-controls="AsideOffcanvasCart">
                        @livewire('cart-icon')
                    </button>
                    <!--== End Cart Icon ==-->

                    <!--== Start Login Icon ==-->
                    @auth()
                        <a class="header-action-btn ms-3 ms-md-10" href="{{ route('user.dashboard') }}">
                                <span class="icon">
                                       <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                         <rect class="icon-rect" width="30" height="30" fill="url(#pattern3)"/>
                                         <defs>
                                           <pattern id="pattern3" patternContentUnits="objectBoundingBox" width="1" height="1">
                                             <use xlink:href="#image0_504:10" transform="scale(0.0333333)"/>
                                           </pattern>
                                           <image id="image0_504:10" width="30" height="30"
                                                  xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABEUlEQVRIie3UMUoDYRDF8Z8psqUpLBRrBS+gx7ATD6E5iSjeQQ/gJUzEwmChnZZaKZiQ0ljsLkhQM5/5Agr74DX7DfOfgZ1Hoz+qAl30Marcx2H1thCtY4DJN76parKqmAH9DM+6eTcArX2QE3yVAO7lBA8TwMNIw6UgeJI46My+rWCjUQL0LVIUBd8lgEO1UfBZAvg8oXamCuWNRu64nRNMmUo/wReSXLXayoDoKc9miMvqW/ZNG2VRNLla2MYudrCFTvX2intlnl/gGu/zDraGYzyLZ/UTjrD6G2AHpxgnAKc9xgmWo9BNPM4BnPYDNiLg24zQ2oNpyFdZvRKZLlGhnvvKPzXXti/Yy7hEo3+iD9EHtgdqxQnwAAAAAElFTkSuQmCC"/>
                                         </defs>
                                       </svg>
                                </span>
                        </a>
                    @endauth
                    @guest()
                        <div class="top-header-list ms-3 ms-md-10">
                            <span><a href="{{ route('login') }}">ورود</a></span>
                             <span class="d-none d-md-inline-block mx-1"> | </span>
                             <span class="d-none d-md-inline-block"><a href="{{ route('register') }}">ثبت نام</a></span>
                        </div>
                    @endguest
                    <!--== End Login Icon ==-->

                    <button class="header-menu-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
<!--== End Header Wrapper ==-->