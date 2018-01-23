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
                                Replay : Coming soon!
                            </div>
                        </div>
                    </div>
                    @foreach($match->teams as $team)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header mdb-color lighten-1 white-text">
                                @if( $team->race == 1)
                                    Humans -
                                    @if( $match->winner == 1)
                                        Winners
                                    @else
                                        Losers
                                    @endif
                                @else
                                    Beasts -
                                    @if( $match->winner == 2)
                                        Winners
                                    @else
                                        Losers
                                    @endif
                                @endif
                            </div>
                            <div class="card-body">
                                <b>Commander:</b> @if($team->commander == 0)
                                    No Commander
                                    @else
                                    {{ $team->user->username }}
                                @endif
                                <br>
                                @foreach($team->actionplayers as $actionplayer)
                                    {{ \App\User::find($actionplayer->user)->username }}<br>
                                    @endforeach
                                Average SF: {{ $team->avg_sf }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
