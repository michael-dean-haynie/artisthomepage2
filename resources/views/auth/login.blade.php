@extends('layouts/master')

@section('to-master-content')
    <div class="row">
        <div class="col-xs-offset-2 col-xs-8 auth-form">
            <form class="" role="form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}

                <p class="fs3rem">Login</p>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="control-label">E-Mail Address</label>

                    <div class="">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="control-label">Password</label>

                    <div class="">
                        <input type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class=" col-md-offset-0">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i>Login
                        </button>
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        <a class="btn btn-link" href="{{ url('/register') }}">Want to become an admin?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
