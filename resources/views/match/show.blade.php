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
                                <img src="{{ asset('img/images/'. $match->map. '.jpg') }}"><br>
                                <b>Map :</b> {{ $match->map }}<br>
                                <b>Server :</b> {{ $match->match_summ->server->name }}<br>
                                <b>Date :</b> {{ $match->match_summ->created_at }}<br>
                                <b>Duration</b> : {{ $match->duration }}<br>
                                <b>Winner :</b> <a data-toggle="collapse" href="#winner" aria-expanded="false" aria-controls="winner">Spoiler</a><br>
                                <div class="collapse" id="winner">
                                    <p>@if( $match->winner == 1)
                                            Humans
                                        @else
                                            Beasts
                                        @endif</p>
                                </div>
                                <b>Replay :</b> <a href="{{ 'http://masterserver1.talesofnewerth.com/replays/'.$match->id.'.s2r' }}">Download</a>
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
                                    <a href="{{ route("user.show", $actionplayer->user->id) }}">{{ $actionplayer->user->username }}</a>
                                    <a data-toggle="modal" data-target="#modal-{{ $actionplayer->user }}" class="fas fa-chart-bar"></a><br>
                                    <div class="modal fade" id="modal-{{ $actionplayer->user }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel-{{ $actionplayer->user }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalLabel--{{ $actionplayer->user->id }}">{{ $actionplayer->user->username }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <i class="game-icon game-icon-medal style-stats"></i> Skill Factor: {{ $actionplayer->sf }}<br>
                                                    <i class="game-icon game-icon-upgrade style-stats"></i> EXP : {{ $actionplayer->exp }}<br>
                                                    <i class="game-icon game-icon-chopped-skull style-stats"></i> Kills: {{ $actionplayer->kills }}<br>
                                                    <i class="game-icon game-icon-shaking-hands style-stats"></i> Assists:  {{ $actionplayer->assists }}<br>
                                                    <i class="game-icon game-icon-chewed-skull style-stats"></i> Deaths: {{ $actionplayer->deaths }}<br>
                                                    <i class="game-icon game-icon-master-of-arms style-stats"></i> K/D/A:
                                                    @if($actionplayer->kills + $actionplayer->assists > 0 and $actionplayer->deaths > 0)
                                                        {{ number_format(($actionplayer->kills + $actionplayer->assists)/$actionplayer->deaths, 2, '.', ',')  }}
                                                        <br>
                                                    @else
                                                        Infinite<br>
                                                    @endif
                                                    <i class="game-icon game-icon-ghost style-stats"></i> Souls: {{ $actionplayer->souls }}<br>
                                                    <i class="game-icon game-icon-demolish style-stats"></i> Razed: {{ $actionplayer->razed }}<br>
                                                    <i class="game-icon game-icon-battle-axe style-stats"></i> Player Damage: {{ $actionplayer->pdmg }}<br>
                                                    <i class="game-icon game-icon-cubes style-stats"></i> Building Damage: {{ $actionplayer->bdmg }}<br>
                                                    <i class="game-icon game-icon-monkey style-stats"></i> Npcs killed: {{ $actionplayer->npc }}<br>
                                                    <i class="game-icon game-icon-ankh style-stats"></i> Hp Healed: {{ $actionplayer->hp_healed }}<br>
                                                    <i class="game-icon game-icon-angel-wings style-stats"></i> Ressurections: {{ $actionplayer->res }}<br>
                                                    <i class="game-icon game-icon-gold-bar style-stats"></i> Gold: {{ $actionplayer->gold }}<br>
                                                    <i class="game-icon game-icon-tinker style-stats"></i> Hp Repaired: {{ $actionplayer->hp_repaired }}<br>
                                                    <i class="game-icon game-icon-pocket-watch style-stats"></i> Time Played: {{ gmdate("H:i:s", $actionplayer->secs) }}<br>
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
