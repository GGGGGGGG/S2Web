@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header mdb-color lighten-1 white-text">
                Match ID: {{ $match->id }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header mdb-color lighten-1 white-text">
                                General Info
                            </div>
                            <div class="card-body">
                                Map : {{ $match->map }}<br>
                                Duration :{{ $match->duration }}<br>
                                Winner: <a data-toggle="collapse" href="#winner" aria-expanded="false" aria-controls="winner">Spoiler</a><br>
                                <div class="collapse" id="winner">
                                    <p>@if( $match->winner == 1)
                                            Humans
                                        @else
                                            Beasts
                                        @endif</p>
                                </div>
                                Replay : Coming soon! <br>
                            </div>
                        </div>
                    </div>
                    @foreach($match->teams as $team)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header mdb-color lighten-1 white-text">
                                @if( $team->race == 1)
                                    Humans
                                @else
                                    Beasts
                                @endif
                            </div>
                            <div class="card-body">
                                <h3>Commander:</h3> @if($team->commander == 0)
                                    No Commander
                                    @else
                                    <a href="{{ route("user.show", $team->user->id) }}">{{ $team->user->username }}</a>
                                @endif
                                <br> <h4>Active Players:</h4>
                                @foreach($team->actionplayers as $actionplayer)
                                    <a href="{{ route("user.show", $actionplayer->user) }}">{{ \App\User::find($actionplayer->user)->username }}</a>
                                    <a data-toggle="modal" data-target="#modal-{{ $actionplayer->user }}" class="fas fa-chart-bar"></a><br>
                                    <div class="modal fade" id="modal-{{ $actionplayer->user }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel-{{ $actionplayer->user }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel--{{ $actionplayer->user }}">{{ \App\User::find($actionplayer->user)->username }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Skill Factor: {{ $actionplayer->sf }}<br>
                                                    EXP : {{ $actionplayer->exp }}<br>
                                                    Kills: {{ $actionplayer->kills }}<br>
                                                    Deaths: {{ $actionplayer->deaths }}<br>
                                                    Souls: {{ $actionplayer->souls }}<br>
                                                    Razed: {{ $actionplayer->razed }}<br>
                                                    Player Damage: {{ $actionplayer->pdmg }}<br>
                                                    Building Damage: {{ $actionplayer->bdmg }}<br>
                                                    Npcs killed: {{ $actionplayer->npc }}<br>
                                                    Hp Healed: {{ $actionplayer->hp_healed }}<br>
                                                    Ressurections: {{ $actionplayer->res }}<br>
                                                    Gold: {{ $actionplayer->gold }}<br>
                                                    Hp Repaired: {{ $actionplayer->hp_repaired }}<br>
                                                    Time Played: {{ gmdate("H:i:s", $actionplayer->secs) }}<br>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                Average SF: {{ $team->avg_sf }}<br>
                                Player Count: {{ count($team->actionplayers) + 1 }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
