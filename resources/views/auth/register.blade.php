@extends('layouts/master')

@section('to-master-content')
    <div class="row">
        <div class="col-xs-offset-2 col-xs-8 form-slate">
            <form class="" role="form" method="POST" action="{{ url('/register') }}">
                {!! csrf_field() !!}

                <p class="fs3rem">Register as Admin</p>
                <div class="form-group{{ $errors->has('key') ? ' has-error' : '' }}">
                    <label class="control-label">Registration Key</label>

                    <div class="">
                        <input type="password" class="form-control" name="key" value="{{ old('key') }}">

                        @if ($errors->has('key'))
                            <span class="help-block">
                            <strong>{{ $errors->first('key') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="control-label">Name</label>

                    <div class="">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                        @if ($errors->has('name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

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

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label class="control-label">Confirm Password</label>

                    <div class="">
                        <input type="password" class="form-control" name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i>Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
