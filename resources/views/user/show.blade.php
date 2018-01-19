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
                            Skill Factor : {{ $user->playerinfo->sf }}<br>
                            Level: {{ $user->playerinfo->level }}<br>
                            Karma: {{ $user->playerinfo->karma }}<br>
                        @else
                            No stats to show.
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h4 class="h4-responsive">Player Stats:</h4>
                        @if($user->playerstat)
                            Experience: {{ $user->playerstat->exp }}<br>
                            Track Record: {{ $user->playerstat->wins }}/{{ $user->playerstat->losses }}<br>
                            Kills: {{ $user->playerstat->kills }} Deaths: {{ $user->playerstat->deaths }}
                            Assists: {{ $user->playerstat->assists }}<br>
                            @if($user->playerstat->kills + $user->playerstat->assists > 0 and $user->playerstat->deaths > 0)
                                KDA: {{ ($user->playerstat->kills + $user->playerstat->assists)/$user->playerstat->deaths  }}
                                <br>
                            @else
                                KDA: N/A<br>
                            @endif
                            Souls: {{ $user->playerstat->souls }}<br>
                            Razed: {{ $user->playerstat->razed }}<br>
                            Player Damage: {{ $user->playerstat->pdmg }}<br>
                            Building Damage: {{ $user->playerstat->bdmg }}<br>
                            NPC Killed: {{ $user->playerstat->npc }}<br>
                            Hp Healed: {{ $user->playerstat->hp_healed }} <br>
                            Resurrection: {{ $user->playerstat->res }} <br>
                            Gold: {{ $user->playerstat->gold }} <br>
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
                        Coming soon!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
