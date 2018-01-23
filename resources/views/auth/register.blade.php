@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header mdb-color lighten-1 white-text">
                Register
            </div>
            <div class="card-body">

                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <div class="col-md-8 offset-md-2">
                            <div class="md-form">
                                <input id="username" type="text" class="form-control" name="username"
                                       value="{{ old('username') }}" required autofocus>
                                <label for="username">Username</label>
                            </div>
                            @if ($errors->has('username'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                        <div class="col-md-8 offset-md-2">
                            <div class="md-form">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" required>
                                <label for="email">E-Mail Address</label>
                            </div>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                        <div class="col-md-8 offset-md-2">
                            <div class="md-form">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <label for="password">Password</label>
                            </div>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">


                        <div class="col-md-8 offset-md-2">
                            <div class="md-form">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>
                                <label for="password-confirm">Confirm Password</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 offset-md-2">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
