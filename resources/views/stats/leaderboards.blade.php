@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header mdb-color lighten-1 white-text">
                Leaderboard
            </div>
            <ul id="tabs" class="nav nav-tabs nav-justified" data-tabs="tabs">
                <li class="nav-item"><a class="nav-link active" href="#sf" data-toggle="tab">SF</a></li>
                <li class="nav-item"><a class="nav-link" href="#assists" data-toggle="tab">Assists</a></li>
                <li class="nav-item"><a class="nav-link" href="#bdmg" data-toggle="tab">Building Damage</a></li>
                <li class="nav-item"><a class="nav-link" href="#hp_healed" data-toggle="tab">HP Healed</a></li>
                <li class="nav-item"><a class="nav-link" href="#hp_repaired" data-toggle="tab">HP Repaired</a></li>
                <li class="nav-item"><a class="nav-link" href="#kills" data-toggle="tab">Kills</a></li>
            </ul>
            <div class="card-body">
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="sf">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Position:</th>
                                <th>Username:</th>
                                <th>SF:</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sf as $player)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>
                                        <a href="{{ route('user.show', $player->user->id) }}">{{ $player->user->username }}</a>
                                    </td>
                                    <td>{{ $player->sf }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="assists">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Position:</th>
                                <th>Username:</th>
                                <th>Assist Factor:</th>
                                <th>Assists:</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($assists as $player)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>
                                        <a href="{{ route('user.show', $player->user->id) }}">{{ $player->user->username }}</a>
                                    </td>
                                    <td>{{ $player->af }}</td>
                                    <td>{{ $player->assists }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="bdmg">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Position:</th>
                                <th>Username:</th>
                                <th>Building Damage Factor:</th>
                                <th>Building Damage:</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bdmg as $player)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>
                                        <a href="{{ route('user.show', $player->user->id) }}">{{ $player->user->username }}</a>
                                    </td>
                                    <td>{{ $player->bf }}</td>
                                    <td>{{ $player->bdmg }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="hp_healed">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Position:</th>
                                <th>Username:</th>
                                <th>Healing Factor:</th>
                                <th>HP Healed:</th>
                                <th>Ressurection:</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hp_healed as $player)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>
                                        <a href="{{ route('user.show', $player->user->id) }}">{{ $player->user->username }}</a>
                                    </td>
                                    <td>{{ $player->hf }}</td>
                                    <td>{{ $player->hp_healed }}</td>
                                    <td>{{ $player->res }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="hp_repaired">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Position:</th>
                                <th>Username:</th>
                                <th>Repair Factor:</th>
                                <th>HP Repaired:</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hp_repaired as $player)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>
                                        <a href="{{ route('user.show', $player->user->id) }}">{{ $player->user->username }}</a>
                                    </td>
                                    <td> {{ $player->rf }}</td>
                                    <td>{{ $player->hp_repaired }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="kills">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Position:</th>
                                <th>Username:</th>
                                <th>Kill Factor:</th>
                                <th>Kills:</th>
                                <th>Player Damage:</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($kills as $player)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>
                                        <a href="{{ route('user.show', $player->user->id) }}">{{ $player->user->username }}</a>
                                    </td>
                                    <td>{{ $player->kf }}</td>
                                    <td>{{ $player->kills }}</td>
                                    <td>{{ $player->pdmg }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
