<?php use \App\Http\Controllers\ViewHelperFunctions as VHF;?>

@extends('layouts/master')

@section('to-master-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin-properties.css')}}">
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-offset-1 col-xs-10">
            <a class="btn btn-primary my-back-button" href="{{url('/admin')}}">
                <span class="glyphicon glyphicon-menu-left back-glyph"></span>
                <span>Admin Dashboard</span>
            </a>
        </div>
        <div class="col-xs-offset-2 col-xs-8 form-slate">
            <p class="fs3rem">Admin Properties</p>
            @include('subviews/validation-errors')
            @include('subviews/validation-success')
            <form method="post" action="{{url('/update-artist-name')}}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="artist-name">Artist Name</label>
                    <input type="text" class="form-control" id="artist-name" name="artist-name" value="{{$artistName}}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success form-control" id="submit" name="submit" value="Update Artist Name">
                </div>
            </form>
            <div class="spacer3rem"></div>
            <hr>
            <form method="post" action="{{url('/update-registration-key')}}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="registration-key">Registration Key</label>
                    <input type="text" class="form-control" id="registration-key" name="registration-key" value="{{$registrationKey}}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success form-control" id="submit" name="submit" value="Update Registration Key">
                </div>
            </form>
        </div>
    </div>
@endsection