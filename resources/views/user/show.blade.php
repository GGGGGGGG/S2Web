@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="user-header">
                    <h1>@if ($user->playerinfo)
                            {{$user->playerinfo->overall_r }} [{{ $user->playerinfo->clan->clan_tag }}]
                        @endif {{$user->username}}</h1>
                </div>
                <div class="content">
                    <div class="col-md-4">
                        <h2>Profile:</h2>
                        Coming soon!
                    </div>
                    <div class="col-md-4">
                        <h2>General Stats:</h2>
                        @if($user->playerinfo)
                            Clan: {{ $user->playerinfo->clan->clan_name }}<br>
                            Skill Factor : {{ $user->playerinfo->sf }}<br>
                            Level: {{ $user->playerinfo->level }}<br>
                            Karma: {{ $user->playerinfo->karma }}<br>
                        @else
                            No stats to show.
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h2>Player Stats:</h2>
                        @if($user->playerstat)
                            Experience: {{ $user->playerstat->exp }}<br>
                            Track Record: {{ $user->playerstat->wins }}/{{ $user->playerstat->losses }}<br>
                            Kills: {{ $user->playerstat->kills }} Deaths: {{ $user->playerstat->deaths }}
                            Assists: {{ $user->playerstat->assists }}
                            @if($user->playerstat->kills + $user->playerstat->assists > 0 or $user->playerstat->deaths > 0)
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
                        <h2>Commander stats:</h2>
                        Coming soon!
                    </div>
                    <div class="col-md-4">
                        <h2>Badges:</h2>
                        Coming soon!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
