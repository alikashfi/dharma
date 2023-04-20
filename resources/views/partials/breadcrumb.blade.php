<!--== Start Page Header Area Wrapper ==-->
 <section class="page-header-area pt-5 pb-5" data-bg-color="#e2dbff">
     <div class="container">
         <div class="row">
             <div class="col-md-5">
                 <div class="page-header-st3-content text-center text-md-end">
                      <ol class="breadcrumb justify-content-center justify-content-md-start">
                          <li class="breadcrumb-item"><a href="{{ route('home') }}">خانه</a></li>
                          @foreach($links ?? [] as $title => $link)
                              @if(is_numeric($title))
                                <li class="breadcrumb-item active text-dark" aria-current="page">{{ $link }}</li>
                              @else
                                <li class="breadcrumb-item"><a href="{{ $link }}">{{ $title }}</a></li>
                              @endif
                          @endforeach
                      </ol>

                     {{-- <nav aria-label="breadcrumb"> --}}
                     {{--     <ol class="breadcrumb"> --}}
                     {{--         <li class="breadcrumb-item active" aria-current="page">Home</li> --}}
                     {{--     </ol> --}}
                     {{-- </nav> --}}

                     {{-- <nav aria-label="breadcrumb"> --}}
                     {{--     <ol class="breadcrumb"> --}}
                     {{--         <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
                     {{--         <li class="breadcrumb-item"><a href="#">Library</a></li> --}}
                     {{--         <li class="breadcrumb-item active" aria-current="page">Data</li> --}}
                     {{--     </ol> --}}
                     {{-- </nav> --}}

                     <h2 class="page-header-title">{{ $links[array_key_last($links)] }}</h2>
                 </div>
             </div>
             @isset($count)
                 <div class="col-md-7">
                     <h5 class="showing-pagination-results mt-5 mt-md-9 text-center text-md-start">{{ __('results') . ": " .  $count }}</h5>
                 </div>
             @endisset
         </div>
     </div>
 </section>
<!--== End Page Header Area Wrapper ==-->