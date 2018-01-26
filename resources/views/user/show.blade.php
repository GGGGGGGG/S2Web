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
                        <h4 class="h4-responsive">Profile:</h4>
                        @foreach($user->bans as $ban)
                            @if($ban->banneduntil > \Carbon\Carbon::now()->format('Y-m-d H:i:s'))
                                This user is currently banned.
                            @endif
                        @endforeach
                        Coming soon!
                    </div>
                    <div class="col-md-4">
                        <h4 class="h4-responsive">General Stats:</h4>
                        @if($user->playerinfo->clan)
                            Clan: {{ $user->playerinfo->clan->clan_name }}<br>
                        @endif
                        @if($user->playerinfo)
                            <i class="game-icon game-icon-medal style-stats"></i> Skill Factor : {{ $user->playerinfo->sf }}<br>
                            <i class="fas fa-level-up-alt style-stats"></i>Level: {{ $user->playerinfo->level }}<br>
                            <i class="game-icon game-icon-yin-yang style-stats"></i>Karma: {{ $user->playerinfo->karma }}<br>
                        @else
                            No stats to show.
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h4 class="h4-responsive">Player Stats:</h4>
                        @if($user->playerstat)
                            <i class="game-icon game-icon-upgrade style-stats"></i> Experience: {{ $user->playerstat->exp }}<br>
                            <i class="far fa-chart-bar style-stats"></i>Track Record: {{ $user->playerstat->wins }}/{{ $user->playerstat->losses }}<br>
                            <i class="game-icon game-icon-chopped-skull style-stats"></i> Kills: {{ $user->playerstat->kills }} <br>
                            <i class="game-icon game-icon-chewed-skull style-stats"></i> Deaths: {{ $user->playerstat->deaths }} <br>
                            <i class="game-icon game-icon-shaking-hands style-stats"></i> Assists: {{ $user->playerstat->assists }}<br>
                            <i class="game-icon game-icon-master-of-arms style-stats"></i>
                            @if($user->playerstat->kills + $user->playerstat->assists > 0 and $user->playerstat->deaths > 0)
                                KDA: {{ number_format(($user->playerstat->kills + $user->playerstat->assists)/$user->playerstat->deaths, 2, '.', ',')  }}
                                <br>
                            @else
                                KDA: N/A<br>
                            @endif
                            <i class="game-icon game-icon-ghost style-stats"></i>  Souls: {{ $user->playerstat->souls }}<br>
                            <i class="game-icon game-icon-demolish style-stats"></i> Razed: {{ $user->playerstat->razed }}<br>
                            <i class="game-icon game-icon-battle-axe style-stats"></i> Player Damage: {{ $user->playerstat->pdmg }}<br>
                            <i class="game-icon game-icon-cubes style-stats"></i> Building Damage: {{ $user->playerstat->bdmg }}<br>
                            <i class="game-icon game-icon-monkey style-stats"></i> NPC Killed: {{ $user->playerstat->npc }}<br>
                            <i class="game-icon game-icon-ankh style-stats"></i> Hp Healed: {{ $user->playerstat->hp_healed }} <br>
                            <i class="game-icon game-icon-angel-wings style-stats"></i> Resurrection: {{ $user->playerstat->res }} <br>
                            <i class="game-icon game-icon-gold-bar style-stats"></i> Gold: {{ $user->playerstat->gold }} <br>
                            <i class="game-icon game-icon-tinker style-stats"></i> Hp Repaired: {{ $user->playerstat->hp_repaired }}<br>
                            <i class="game-icon game-icon-pocket-watch style-stats"></i> Time Played: {{ gmdate("H:i:s", $user->playerstat->secs) }}<br>
                        @else
                            No stats to show.
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h4 class="h4-responsive">Commander stats:</h4>
                        @if($user->commanderstat)
                            Track record: {{ $user->commanderstat->wins }}/{{ $user->commanderstat->losses }}<br>
                            Experience: {{ $user->commanderstat->exp }}<br>
                            Buildings built: {{ $user->commanderstat->builds }} <br>
                            Gold earned: {{ $user->commanderstat->gold }}<br>
                            Buildings destroyed: {{ $user->commanderstat->razed }}<br>
                            Hp Healed: {{ $user->commanderstat->hp_healed }}<br>
                            Player Damage {{ $user->commanderstat->pdmg }} <br>
                            Kills: {{ $user->commanderstat->kills }}<br>
                            Assists: {{ $user->commanderstat->assists }} <br>
                            Debuffs: {{ $user->commanderstat->debuffs }}<br>
                            Buffs: {{ $user->commanderstat->buffs }} <br>
                            Orders: {{ $user->commanderstat->orders }} <br>
                            Winstreak: {{ $user->commanderstat->winstreak }}<br>
                        @else
                            No stats to show.
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h2>Badges:</h2>
                        Coming soon!
                    </div>
                    <div class="col-md-4">
                        <h2>Match History:</h2>
                        @foreach($user_matches as $user_match)
                            <a href="{{ route('match.show', $user_match->match_id) }}">{{ $user_match->match_id }}</a><br>
                        @endforeach

                        {{ $user_matches->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
