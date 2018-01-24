@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header mdb-color lighten-1 white-text">
                {{ $server->id }}. {{ $server->name }}
            </div>
            <div class="card-body">
                            <b>Players currently online on this server:</b><br>
                            @foreach($server->players as $player)
                                @if($player->online == 1)
                                    <a href="{{ route('user.show', $player->user->id ) }}">{{ $player->user->username }}</a><br>
                                @endif
                                @endforeach
                    </div>
            </div>
@endsection

