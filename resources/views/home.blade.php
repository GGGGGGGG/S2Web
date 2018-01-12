@extends('layouts.app')

@section('content')

    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-1z" data-slide-to="1"></li>
            <li data-target="#carousel-example-1z" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('img/carrousel/1.jpg') }}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/carrousel/2.jpg') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('img/carrousel/3.jpg') }}" alt="Third slide">
            </div>
        </div>

        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br>

    <div class="container">
        <div class="row">
            @foreach($articles as $article)
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card scard mdb-color lighten-1">
                        @if($article->image)
                            <img class="img-fluid"
                                 src="{{ asset('img/images/' . $article->image->image_url) }}"
                                 alt="Card image cap">
                        @endif

                        <div class="card-body">
                            <h4 class="card-title white-text">{{ $article->title }}</h4>

                            <p class="card-text white-text">{{ $article->content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
