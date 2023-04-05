@extends('layouts.main', ['breadcrumb' => $breadcrumb])

@section('content')

    <!--== Start My Account Area Wrapper ==-->
    <section class="my-account-area section-space">
        <div class="container">
            <div class="row">
                @include('partials.user-panel-nav')
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content" id="nav-tabContent">
                        @yield('panel')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End My Account Area Wrapper ==-->

@endsection