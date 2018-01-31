@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header mdb-color lighten-1 white-text">
                @if ($user->playerinfo)
                    {{$user->playerinfo->overall_r }}
                @endif
                @if ($user->playerinfo->clan)
                    [{{ $user->playerinfo->clan->clan_tag }}]
                @endif
                {{$user->username}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header mdb-color lighten-1 white-text">
                                Profile
                            </div>
                            <div class="card-body">
                                Coming soon!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header mdb-color lighten-1 white-text">
                                General Stats:
                            </div>
                            <div class="card-body">
                                @if($user->playerinfo->clan)
                                    Clan: {{ $user->playerinfo->clan->clan_name }}<br>
                                @endif
                                @if($user->playerinfo)
                                    <i class="game-icon game-icon-medal style-stats"></i> Skill Factor
                                    : {{ $user->playerinfo->sf }}<br>
                                    Achievement points: {{ $user->playerinfo->ap }}<br>
                                    <i class="fas fa-level-up-alt style-stats"></i>Level: {{ $user->playerinfo->level }}
                                    <br>
                                    <i class="game-icon game-icon-yin-yang style-stats"></i>
                                    Karma: {{ $user->playerinfo->karma }}<br>
                                    <i class="game-icon game-icon-pocket-watch style-stats"></i> Time
                                    Played: {{ gmdate("H:i:s", $user->playerstat->secs) }}<br>
                                    Last online: {{ $user->updated_at }}
                                @else
                                    No stats to show.
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header mdb-color lighten-1 white-text">
                                Player Stats:
                            </div>
                            <div class="card-body">
                                @if($user->playerstat)
                                    <i class="game-icon game-icon-upgrade style-stats"></i>
                                    Experience: {{ $user->playerstat->exp }}<br>
                                    <i class="far fa-chart-bar style-stats"></i>Track
                                    Record: {{ $user->playerstat->wins }}
                                    /{{ $user->playerstat->losses }}<br>
                                    <i class="game-icon game-icon-chopped-skull style-stats"></i>
                                    Kills: {{ $user->playerstat->kills }} <br>
                                    <i class="game-icon game-icon-chewed-skull style-stats"></i>
                                    Deaths: {{ $user->playerstat->deaths }} <br>
                                    <i class="game-icon game-icon-shaking-hands style-stats"></i>
                                    Assists: {{ $user->playerstat->assists }}<br>
                                    <i class="game-icon game-icon-master-of-arms style-stats"></i>
                                    @if($user->playerstat->kills + $user->playerstat->assists > 0 and $user->playerstat->deaths > 0)
                                        KDA: {{ number_format(($user->playerstat->kills + $user->playerstat->assists)/$user->playerstat->deaths, 2, '.', ',')  }}
                                        <br>
                                    @else
                                        KDA: N/A<br>
                                    @endif
                                    <i class="game-icon game-icon-ghost style-stats"></i>
                                    Souls: {{ $user->playerstat->souls }}
                                    <br>
                                    <i class="game-icon game-icon-demolish style-stats"></i>
                                    Razed: {{ $user->playerstat->razed }}<br>
                                    <i class="game-icon game-icon-battle-axe style-stats"></i> Player
                                    Damage: {{ $user->playerstat->pdmg }}<br>
                                    <i class="game-icon game-icon-cubes style-stats"></i> Building
                                    Damage: {{ $user->playerstat->bdmg }}<br>
                                    <i class="game-icon game-icon-monkey style-stats"></i> NPC
                                    Killed: {{ $user->playerstat->npc }}<br>
                                    <i class="game-icon game-icon-ankh style-stats"></i> Hp
                                    Healed: {{ $user->playerstat->hp_healed }} <br>
                                    <i class="game-icon game-icon-angel-wings style-stats"></i>
                                    Resurrection: {{ $user->playerstat->res }} <br>
                                    <i class="game-icon game-icon-gold-bar style-stats"></i>
                                    Gold: {{ $user->playerstat->gold }}
                                    <br>
                                    <i class="game-icon game-icon-tinker style-stats"></i> Hp
                                    Repaired: {{ $user->playerstat->hp_repaired }}<br>
                                @else
                                    No stats to show.
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header mdb-color lighten-1 white-text">
                                Commander stats:
                            </div>
                            <div class="card-body">
                                @if($user->commanderstat)
                                    <i class="game-icon game-icon-stars-stack style-stats"></i><a data-toggle="modal"
                                                                                                  data-target="#modalComm">Commander
                                        Rating: {{ $avg_comm }}</a><br>
                                    <i class="far fa-chart-bar style-stats"></i>Track
                                    record: {{ $user->commanderstat->wins }}/{{ $user->commanderstat->losses }}
                                    <br>
                                    <i class="game-icon game-icon-upgrade style-stats"></i>
                                    Experience: {{ $user->commanderstat->exp }}<br>
                                    <i class="game-icon game-icon-castle style-stats"></i>Buildings
                                    built: {{ $user->commanderstat->builds }} <br>
                                    <i class="game-icon game-icon-gold-mine style-stats"></i>Gold
                                    earned: {{ $user->commanderstat->gold }}<br>
                                    <i class="game-icon game-icon-demolish style-stats"></i>Buildings
                                    destroyed: {{ $user->commanderstat->razed }}<br>
                                    <i class="game-icon game-icon-health-increase style-stats"></i>Hp
                                    Healed: {{ $user->commanderstat->hp_healed }}<br>
                                    <i class="game-icon game-icon-sword-wound style-stats"></i>Player
                                    Damage {{ $user->commanderstat->pdmg }} <br>
                                    <i class="game-icon game-icon-sacrificial-dagger style-stats"></i>
                                    Kills: {{ $user->commanderstat->kills }}<br>
                                    <i class="game-icon game-icon-master-of-arms style-stats"></i>
                                    Assists: {{ $user->commanderstat->assists }} <br>
                                    <i class="game-icon game-icon-thumb-down style-stats"></i>
                                    Debuffs: {{ $user->commanderstat->debuffs }}<br>
                                    <i class="game-icon game-icon-muscle-up style-stats"></i>
                                    Buffs: {{ $user->commanderstat->buffs }} <br>
                                    <i class="game-icon game-icon-acoustic-megaphone style-stats"></i>
                                    Orders: {{ $user->commanderstat->orders }} <br>
                                @else
                                    No stats to show.
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalComm" tabindex="-1" role="dialog" aria-labelledby="commModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="commModalLabel">Commander votes:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Player name:</th>
                                            <th>Match ID:</th>
                                            <th>Rating:</th>
                                            <th>Reason:</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($votes as $vote)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('user.show', $vote->user->id) }}">{{ $vote->user->username }}</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('match.show', $vote->match->id) }}">{{ $vote->match->id }}</a>
                                                </td>
                                                <td>{{ $vote->vote }}</td>
                                                <td>{{ $vote->reason }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $votes->links() }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header mdb-color lighten-1 white-text">
                                Badges:
                            </div>
                            <div class="card-body">
                                @foreach($user->badges as $badge)
                                    <i class="{{ $badge->achievement->style }}" data-toggle="tooltip"
                                       data-placement="bottom"
                                       title="{{ $badge->achievement->name }}:  {{ $badge->achievement->description }} pts: {{ $badge->achievement->points }}"></i>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header mdb-color lighten-1 white-text">
                                Match History:
                            </div>
                            <div class="card-body">
                                @foreach($user_matches as $user_match)
                                    <a href="{{ route('match.show', $user_match->match_id) }}">{{ $user_match->match_id }}
                                        - {{ $user_match->match->match_summ->created_at}}</a>
                                    <br>
                                @endforeach

                                {{ $user_matches->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra_scripts')
    <script>
        // Tooltips Initialization
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

@endsection
