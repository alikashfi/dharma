<div class="col-lg-3 col-md-4">
    <div class="my-account-tab-menu nav nav-tabs" id="nav-tab" role="tablist">
        <a href="{{ route('user.dashboard') }}" class="nav-link {{ ! request()->routeIs('user.dashboard') ?: 'active' }}" id="dashboad-tab">داشبورد</a>
        @if (auth()->user()?->isAdmin())
            <a href="{{ route('filament.pages.dashboard') }}" class="nav-link" id="dashboad-tab">داشبورد ادمین</a>
        @endif
        <a href="{{ route('user.orders') }}" class="nav-link {{ ! request()->routeIs('user.orders') ?: 'active' }}" id="orders-tab"> سفارشات</a>
        <a href="{{ route('user.payments') }}" class="nav-link {{ ! request()->routeIs('user.payments') ?: 'active' }}" id="payment-method-tab">پرداخت ها</a>
        <a href="{{ route('user.details') }}" class="nav-link {{ ! request()->routeIs('user.details') ?: 'active' }}" id="account-info-tab">مشخصات</a>
        <a href="{{ route('user.settings') }}" class="nav-link {{ ! request()->routeIs('user.settings') ?: 'active' }}" id="account-info-tab">تنظیمات</a>
        <button class="nav-link" onclick="document.querySelector('#logout-form').submit()">خروج</button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>