@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header mdb-color lighten-1 white-text">
                        Leaderboard
                    </div>
                    <div class="card-body">
                        Coming soon!
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header mdb-color lighten-1 white-text">
                        Search
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('stats.search') }}">
                        {{ csrf_field() }}

                            <div class="md-form">
                                <input id="keyword" type="text" class="form-control" name="keyword"
                                       value="{{ old('keyword') }}">
                                <label for="keyword">Username/Match ID</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Search
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header mdb-color lighten-1 white-text">
                        Lastest matches
                    </div>
                    <div class="card-body">
                        Coming soon!
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header mdb-color lighten-1 white-text">
                        Players
                    </div>
                    <div class="card-body">
                        @if($users)
                            @foreach($users as $user)
                                <a href="{{ route('user.show', $user->id ) }}">{{ $user->username }}</a><br>
                            @endforeach
                        @else
                            No results.
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header mdb-color lighten-1 white-text">
                        Matches
                    </div>
                    <div class="card-body">
                        @if($matches)
                            @foreach($matches as $match)
                                {{ $match->id }}
                            @endforeach
                        @else
                            No Results.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
