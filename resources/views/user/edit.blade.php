@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header mdb-color lighten-1 white-text">
                Edit my account
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('user.update', \Auth::user()) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                        <div class="col-md-6">
                            <div class="md-form">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ $user->email }}" required>
                                <label for="email">E-Mail Address</label>
                            </div>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">


                        <div class="col-md-6">
                            <div class="md-form">
                                <input id="current_password" type="password" class="form-control"
                                       name="current_password" required>
                                <label for="current_password" class="col-md-4 control-label">Current password:</label>
                            </div>

                            @if ($errors->has('current_password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                        <div class="col-md-6">
                            <div class="md-form">
                                <input id="password" type="password" class="form-control" name="password">
                                <label for="password" class="col-md-4 control-label">Password</label>
                            </div>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">


                        <div class="col-md-6">
                            <div class="md-form">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
