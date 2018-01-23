@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
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
                                <label for="keyword">Username</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Search
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-8 offset-md-2">
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
        </div>
    </div>
@endsection
