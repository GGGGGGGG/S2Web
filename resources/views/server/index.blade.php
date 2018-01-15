@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header mdb-color lighten-1 white-text">
                Server List:
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>IP:Port</th>
                            <th>Connections</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($servers as $server)
                            @if($server->online == 1)
                                <tr>
                                    <td>{{ $server->id }}</td>
                                    <td><a href="{{ route('server.show', $server->id) }}">{{ $server->name }}</a></td>
                                    <td>{{ $server->ip }}:{{ $server->port }}</td>
                                    <td>{{ $server->num_conn }}/{{ $server->max_conn }}</td>
                                    <td>{{ $server->description }}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
