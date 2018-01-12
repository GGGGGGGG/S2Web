@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card scard mdb-color lighten-1">
                        @if($category->image)
                            <img class="img-fluid"
                                 src="{{ asset('img/images/' . $category->image->image_url) }}"
                                 alt="Card image cap">
                        @endif

                        <div class="card-body">
                            <a href="{{ route('download.show', $category->id) }}"
                               class="btn btn-primary">{{ $category->name }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
