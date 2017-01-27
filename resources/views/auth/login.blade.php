@extends('layouts.app')

@section('content')
    <h1>Login</h1>

    <form class="form-horizontal row justify-content-md-center" role="form" method="POST" action="{{ url('/login') }}">
        <fieldset class="col col-lg-6">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' form-control-danger' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' form-control-danger' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group">
                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Remember Me</span>
                </label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Login
                </button>
            </div>
        </fieldset>
    </form>
@endsection
