@if ($errors->any())
    <div class="alert alert-danger fade show" role="alert">
        <p class="alert-heading">مشکلی پیش آمده است:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close fs-5 position-absolute start-0 text-danger top-0" data-bs-dismiss="alert" aria-label="Close">x</button>
    </div>
@endif

@if(session('flash'))
     <div class="alert alert-success" role="alert">
         <p>{!! session('flash') !!}</p>
         <button type="button" class="btn-close fs-5 position-absolute start-0 text-success top-0" data-bs-dismiss="alert" aria-label="Close">x</button>
     </div>
@endif