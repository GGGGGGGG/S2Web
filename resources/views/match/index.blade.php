@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header mdb-color lighten-1 white-text">
                        Search
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('match.search') }}">
                            {{ csrf_field() }}

                            <div class="md-form">
                                <input id="keyword" type="text" class="form-control" name="keyword"
                                       value="{{ old('keyword') }}">
                                <label for="keyword">Match ID:</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Search
                            </button>
                        </form>
                    </div>
                </div>
                <br>
                    <div class="card">
                        <div class="card-header mdb-color lighten-1 white-text">
                            Matches
                        </div>
                        <div class="card-body">
                            @if($matches)
                                @foreach($matches as $match)
                                    <a href="{{ route('match.show', $match->id) }}">{{ $match->id }}</a>,
                                @endforeach
                            @else
                                No Results.
                            @endif
                        </div>
                    </div>
                </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header mdb-color lighten-1 white-text">
                        Lastest matches
                    </div>
                    <div class="card-body">
                        @foreach($last_matches as $match)
                            <a href="{{ route('match.show', $match->id) }}">{{ $match->id }}</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
