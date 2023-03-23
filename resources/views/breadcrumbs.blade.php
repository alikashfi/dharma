<!--== Start Page Header Area Wrapper ==-->
<section class="page-header-area pt-10 pb-9" data-bg-color="#FFF3DA">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="page-header-st3-content text-center text-md-start">
                    <ol class="breadcrumb justify-content-center justify-content-md-start">
                        <li class="breadcrumb-item"><a class="text-dark" href="{{ route('home') }}">خانه</a></li>
                        @foreach($links ?? [] as $link)
                            <li class="breadcrumb-item active text-dark" aria-current="page">{{ $link }}</li>
                        @endforeach
                    </ol>
                    <h2 class="page-header-title">{{ $title }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== End Page Header Area Wrapper ==-->