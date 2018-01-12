@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="jumbotron">
            <h1 class="h1-responsive">{{ $server->id }}. {{ $server->name }}</h1>
                            <b>Players currently online on this server:</b><br>
                            @foreach($server->players as $player)
                                @if($player->online == 1)
                                    <a href="{{ route('user.show', $player->user ) }}">{{ \App\User::find($player->user)->username }}</a><br>
                                @endif
                                @endforeach
                    </div>
            </div>
@endsection

