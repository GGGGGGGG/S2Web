@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            @foreach($category->downloads as $download)
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card scard mdb-color lighten-1">
                        @if($download->image)
                            <img class="img-fluid"
                                 src="{{ asset('img/images/' . $download->image->image_url) }}"
                                 alt="Card image cap">
                        @endif
                        <div class="card-body">
                            <h4 class="card-title white-text">{{ $download->name }}</h4>
                            <p class="card-text white-text">{{ $download->description }}</p>


                            <a href="{{ $download->url }}"
                               class="btn btn-primary">Download</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
