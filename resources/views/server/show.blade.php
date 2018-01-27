@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header mdb-color lighten-1 white-text">
                {{ $server->id }}. {{ $server->name }}
            </div>
            <div class="card-body">
                <b>IP:Port</b> {{ $server->ip }}:{{ $server->port }}<br>
                <b>Connections:</b> {{ $server->num_conn }}/{{ $server->max_conn }}<br>
                <b>Name:</b> {{ $server->name }}<br>
                @if($server->official == 1)
                    This is an official server.
                @endif
                <b>Description:</b><p>{{ $server->description }}</p><br>
                <b>Status:</b> {{ $server->status }}<br>
                <b>Current map:</b> {{ $server->map }}<br>
                <b>Next map:</b> {{ $server->next_map }}<br>
                            <b>Players currently online on this server:</b><br>
                            @foreach($server->players as $player)
                                @if($player->online == 1)
                                    <a href="{{ route('user.show', $player->user->id ) }}">{{ $player->user->username }}</a><br>
                                @endif
                                @endforeach
                    </div>
            </div>
@endsection

