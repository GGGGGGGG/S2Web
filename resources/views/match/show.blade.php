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
                                <b>Winner :</b> <a data-toggle="collapse" href="#winner" aria-expanded="false"
                                                   aria-controls="winner">Spoiler</a><br>
                                <div class="collapse" id="winner">
                                    <p>@if( $match->winner == 1)
                                            Humans
                                        @else
                                            Beasts
                                        @endif</p>
                                </div>
                                <b>Replay :</b> <a
                                        href="{{ 'http://masterserver1.talesofnewerth.com/replays/'.$match->id.'.s2r' }}">Download</a>
                            </div>
                        </div>
                    </div>
                    @foreach($match->teams as $team)
                        <div class="modal fade" id="modal-{{ $team->id }}" tabindex="-1" role="dialog"
                             aria-labelledby="modalLabel-{{ $team->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel--{{ $team->id }}">@if( $team->race == 1)
                                                Humans
                                            @else
                                                Beasts
                                            @endif</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div id="pdmg-{{$team->id}}"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div id="bdmg-{{$team->id}}"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div id="hphealed-{{$team->id}}"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div id="hprepaired-{{$team->id}}"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div id="exp-{{$team->id}}"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div id="gold-{{$team->id}}"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div id="kills-{{$team->id}}"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div id="assists-{{$team->id}}"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div id="deaths-{{$team->id}}"></div>
                                            </div>
                                        </div>

                                        @piechart('Teampdmg-'.$team->id, 'pdmg-'.$team->id)

                                        @piechart('Teambdmg-'.$team->id, 'bdmg-'.$team->id)

                                        @piechart('Teamhphealed-'.$team->id, 'hphealed-'.$team->id)

                                        @piechart('Teamhprepaired-'.$team->id, 'hprepaired-'.$team->id)

                                        @piechart('Teamexp-'.$team->id, 'exp-'.$team->id)

                                        @piechart('Teamgold-'.$team->id, 'gold-'.$team->id)

                                        @piechart('Teamkills-'.$team->id, 'kills-'.$team->id)

                                        @piechart('Teamassists-'.$team->id, 'assists-'.$team->id)

                                        @piechart('Teamdeaths-'.$team->id, 'deaths-'.$team->id)
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        <a data-toggle="modal" data-target="#modal-{{ $actionplayer->user }}"
                                           class="fas fa-chart-bar"></a><br>
                                        <div class="modal fade" id="modal-{{ $actionplayer->user }}" tabindex="-1"
                                             role="dialog" aria-labelledby="modalLabel-{{ $actionplayer->user }}"
                                             aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="modalLabel--{{ $actionplayer->user->id }}">{{ $actionplayer->user->username }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body row">
                                                        <div class="col-md-6">
                                                            <i class="game-icon game-icon-medal style-stats"></i> Skill
                                                            Factor: {{ $actionplayer->sf }}<br>
                                                            <i class="game-icon game-icon-upgrade style-stats"></i> EXP
                                                            : {{ $actionplayer->exp }}<br>
                                                            <i class="game-icon game-icon-chopped-skull style-stats"></i>
                                                            Kills: {{ $actionplayer->kills }}<br>
                                                            <i class="game-icon game-icon-shaking-hands style-stats"></i>
                                                            Assists: {{ $actionplayer->assists }}<br>
                                                            <i class="game-icon game-icon-chewed-skull style-stats"></i>
                                                            Deaths: {{ $actionplayer->deaths }}<br>
                                                            <i class="game-icon game-icon-master-of-arms style-stats"></i>
                                                            K/D/A:
                                                            @if($actionplayer->kills + $actionplayer->assists > 0 and $actionplayer->deaths > 0)
                                                                {{ number_format(($actionplayer->kills + $actionplayer->assists)/$actionplayer->deaths, 2, '.', ',')  }}
                                                                <br>
                                                            @else
                                                                Infinite<br>
                                                            @endif
                                                            <i class="game-icon game-icon-ghost style-stats"></i>
                                                            Souls: {{ $actionplayer->souls }}<br>
                                                            <i class="game-icon game-icon-demolish style-stats"></i>
                                                            Razed: {{ $actionplayer->razed }}<br>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <i class="game-icon game-icon-battle-axe style-stats"></i>
                                                            Player Damage: {{ $actionplayer->pdmg }}<br>
                                                            <i class="game-icon game-icon-cubes style-stats"></i>
                                                            Building Damage: {{ $actionplayer->bdmg }}<br>
                                                            <i class="game-icon game-icon-monkey style-stats"></i> Npcs
                                                            killed: {{ $actionplayer->npc }}<br>
                                                            <i class="game-icon game-icon-ankh style-stats"></i> Hp
                                                            Healed: {{ $actionplayer->hp_healed }}<br>
                                                            <i class="game-icon game-icon-angel-wings style-stats"></i>
                                                            Ressurections: {{ $actionplayer->res }}<br>
                                                            <i class="game-icon game-icon-gold-bar style-stats"></i>
                                                            Gold: {{ $actionplayer->gold }}<br>
                                                            <i class="game-icon game-icon-tinker style-stats"></i> Hp
                                                            Repaired: {{ $actionplayer->hp_repaired }}<br>
                                                            <i class="game-icon game-icon-pocket-watch style-stats"></i>
                                                            Time Played: {{ gmdate("H:i:s", $actionplayer->secs) }}<br>
                                                        </div>
                                                        <div id="chart-div-{{ $actionplayer->user->id }}"></div>
                                                        @piechart('Contribution-'.$actionplayer->user->id, 'chart-div-'.
                                                        $actionplayer->user->id)

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    Average SF: {{ $team->avg_sf }}<br>
                                    @if($team->commander != 0)
                                        @php $commander = 1 @endphp
                                    @else
                                        @php $commander = 0 @endphp
                                    @endif
                                    Player Count: {{ count($team->actionplayers) + $commander }}
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#modal-{{ $team->id }}">View Advanced
                                        Stats</a><br>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header mdb-color lighten-1 white-text">
                            Awards:
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card card-margin">
                                        <div class="card-header mdb-color lighten-1 white-text">
                                            <i class="game-icon game-icon-chopped-skull style-stats"></i> Sadist
                                        </div>
                                        <div class="card-body">
                                            <u>Most kills :</u> <br>
                                            <a href="{{ route("user.show", $mostkills->user->id) }}">{{ $mostkills->user->username }}</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-3">
                                    <div class="card card-margin">
                                        <div class="card-header mdb-color lighten-1 white-text">
                                            <i class="game-icon game-icon-upgrade style-stats"></i> Veteran
                                        </div>
                                        <div class="card-body">
                                            <u>Most experience : </u><br>
                                            <a href="{{ route("user.show", $mostexp->user->id) }}">{{ $mostexp->user->username }}</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-3">
                                    <div class="card card-margin">
                                        <div class="card-header mdb-color lighten-1 white-text">
                                            <i class="game-icon game-icon-cubes style-stats"></i> Homewrecker
                                        </div>
                                        <div class="card-body">
                                            <u>Most building damage : </u> <br>
                                            <a href="{{ route("user.show", $mostbdmg->user->id) }}">{{ $mostbdmg->user->username }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card card-margin">
                                        <div class="card-header mdb-color lighten-1 white-text">
                                            <i class="game-icon game-icon-ankh style-stats"></i> Mother Teresa
                                        </div>
                                        <div class="card-body">
                                            <u>Most experience :</u> <br>
                                            <a href="{{ route("user.show", $mosthphealed->user->id) }}">{{ $mosthphealed->user->username }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card card-margin">
                                        <div class="card-header mdb-color lighten-1 white-text">
                                            <i class="game-icon game-icon-monkey style-stats"></i> Biggest MMORPG Fan
                                        </div>
                                        <div class="card-body">
                                            <u>Most npcs killed : </u> <br>
                                            <a href="{{ route("user.show", $mostnpckilled->user->id) }}">{{ $mostnpckilled->user->username }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card card-margin">
                                        <div class="card-header mdb-color lighten-1 white-text">
                                            <i class="game-icon game-icon-monkey style-stats"></i> Vegan Award
                                        </div>
                                        <div class="card-body">
                                            <u>Least npcs killed : </u><br>
                                            <a href="{{ route("user.show", $leastnpckilled->user->id) }}"> {{ $leastnpckilled->user->username }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card card-margin">
                                        <div class="card-header mdb-color lighten-1 white-text">
                                            <i class="game-icon game-icon-master-of-arms style-stats"></i> Feeder
                                        </div>
                                        <div class="card-body">
                                            <u>Most deaths : </u> <br>
                                            <a href="{{ route("user.show", $mostdeaths->user->id) }}">{{ $mostdeaths->user->username }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card card-margin">
                                        <div class="card-header mdb-color lighten-1 white-text">
                                            <i class="game-icon game-icon-prayer style-stats"></i> Ghandi Award
                                        </div>
                                        <div class="card-body">
                                            <u>Least kills : </u> <br>
                                            <a href="{{ route("user.show", $leastkills->user->id) }}">{{ $leastkills->user->username }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card card-margin">
                                        <div class="card-header mdb-color lighten-1 white-text">
                                            <i class="game-icon game-icon-gold-bar style-stats"></i> Entrepreneur
                                        </div>
                                        <div class="card-body">
                                            <u>Most gold collected : </u> <br>
                                            <a href="{{ route("user.show", $mostgold->user->id) }}">{{ $mostgold->user->username }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
