@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header mdb-color lighten-1 white-text">
                Leaderboard
            </div>
            <div class="card-body">
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
                            <td><a href="{{ route('user.show', $player->user->id) }}">{{ $player->user->username }}</a></td>
                            <td>{{ $player->sf }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

