@extends('layouts/master')

@section('to-master-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/email.css')}}">
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-offset-2 col-xs-8 form-slate">
            <p class="fs3rem">Reset Password</p>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="" role="form" method="POST" action="{{ url('/password/email') }}">
                {!! csrf_field() !!}

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

                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-envelope"></i>Send Password Reset Link
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection