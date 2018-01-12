@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header mdb-color lighten-1 white-text">
                Reset Password
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col-md-6">
                            <div class="md-form">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ $email or old('email') }}" required autofocus>
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


                        <div class="col-md-6">
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

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                        <div class="col-md-6">
                            <div class="md-form">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>
                                <label for="password-confirm">Confirm Password</label>
                            </div>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Reset Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
