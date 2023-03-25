<!--== Start Header Wrapper ==-->
<header class="header-area {{ ! isset($header) ?: 'sticky-header header-transparent' }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-5 col-lg-2 col-xl-1">
                <div class="header-logo">
                    <a href="index.html">
                        <img class="logo-main" src="/assets/images/logo.webp" width="95" height="68" alt="Logo" />
                    </a>
                </div>
            </div>
            <div class="col-lg-7 col-xl-7 d-none d-lg-block">
                <div class="header-navigation ps-7">
                    <ul class="main-nav justify-content-start">
                        <li class="has-submenu"><a href="{{ route('home') }}">home</a>
                            <ul class="submenu-nav">
                                <li><a href="index.html">Home One</a></li>
                                <li><a href="index-two.html">Home Two</a></li>
                            </ul>
                        </li>
                        <li><a href="about-us.html">about</a></li>
                        <li class="has-submenu position-static"><a href="{{ route('shop') }}">محصولات</a>
                            <ul class="submenu-nav-mega">
                                @foreach($headerCategories->where('parent_id', null) as $category)
                                    <li><a href="{{ route('category', $category->slug) }}" class="mega-title">{{ $category->name }}</a>
                                        <ul>
                                            @foreach($headerCategories->where('parent_id', $category->id) as $category)
                                                <li><a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                                {{-- <li><a href="#/" class="mega-title">Single Product</a> --}}
                                {{--     <ul> --}}
                                {{--         <li><a href="product-details-normal.html">Single Product Normal</a></li> --}}
                                {{--         <li><a href="product-details.html">Single Product Variable</a></li> --}}
                                {{--         <li><a href="product-details-group.html">Single Product Group</a></li> --}}
                                {{--         <li><a href="product-details-affiliate.html">Single Product Affiliate</a></li> --}}
                                {{--     </ul> --}}
                                {{-- </li> --}}
                                {{-- <li><a href="#/" class="mega-title">Others Pages</a> --}}
                                {{--     <ul> --}}
                                {{--         <li><a href="product-cart.html">Shopping Cart</a></li> --}}
                                {{--         <li><a href="product-checkout.html">Checkout</a></li> --}}
                                {{--         <li><a href="product-wishlist.html">Wishlist</a></li> --}}
                                {{--         <li><a href="product-compare.html">Compare</a></li> --}}
                                {{--     </ul> --}}
                                {{-- </li> --}}
                            </ul>
                        </li>
                        <li class="has-submenu"><a href="blog.html">Blog</a>
                            <ul class="submenu-nav">
                                <li class="has-submenu"><a href="#/">Blog Layout</a>
                                    <ul class="submenu-nav">
                                        <li><a href="blog.html">Blog Grid</a></li>
                                        <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                        <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu"><a href="account-login.html">Pages</a>
                            <ul class="submenu-nav">
                                <li><a href="account-login.html">My Account</a></li>
                                <li><a href="faq.html">Frequently Questions</a></li>
                                <li><a href="page-not-found.html">Page Not Found</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-7 col-lg-3 col-xl-4">
                <div class="header-action justify-content-end">
                    <button class="header-action-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasSearch" aria-controls="AsideOffcanvasSearch">
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

                    <button class="header-action-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#AsideOffcanvasCart" aria-controls="AsideOffcanvasCart">
                                <span class="icon">
                  <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect class="icon-rect" width="30" height="30" fill="url(#pattern2)"/>
                    <defs>
                      <pattern id="pattern2" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0_504:9" transform="scale(0.0333333)"/>
                      </pattern>
                      <image id="image0_504:9" width="30" height="30" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABFUlEQVRIie2VMU7DMBSGvwAqawaYuAmKxCW4A1I5Qg4AA93KBbp1ZUVUlQJSVVbCDVhgzcTQdLEVx7WDQ2xLRfzSvzzb+d6zn2MYrkugBBYevuWsHKiFn2JBMwH8Bq6Aw1jgBwHOYwGlPgT4LDZ4I8BJDNiEppl034UEJ8DMAJ0DByHBACPgUYEugePQUKkUWAmnsaB/Ry/YO9aXCwlT72AdrqaWEohwBWxSwc8ReIVtYIr5bM5pXqO+Men7rozGlkVSv4lJj1WQfsbvXVkNVNk1eEK4ik9/yuwzAPhLh5iuU4jtftMDR4ZJJXChxTJ2H3zXGDgWc43/X2Wro8G81a8u2fXU2nXiLVAxvNIKuPGW/r/2SltF+a3Rkw4pmwAAAABJRU5ErkJggg=="/>
                    </defs>
                  </svg>
                </span>
                    </button>

                    @auth()
                        <a class="header-action-btn" href="{{ route('user.dashboard') }}">
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
                        <div class="top-header-list">
                            <span><a href="{{ route('login') }}">ورود</a></span>
                            <span class="mx-1"> | </span>
                            <span><a href="{{ route('register') }}">ثبت نام</a></span>
                        </div>
                    @endguest

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