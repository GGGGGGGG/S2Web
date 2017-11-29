@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="user-header">
                    <h1>{{$user->username}}</h1>
                </div>
                <div class="content">
                    <div class="well">
                        Nothing yet.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
