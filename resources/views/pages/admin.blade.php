@extends('layouts/master')

@section('to-master-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
@endsection

@section('to-master-content')
    @include('subviews/validation-errors')
    @include('subviews/validation-success')
    <div class="row admin-row">
        <div class="col-xs-6 col-md-4">
            <div class="row">
                <a href="{{url('/upload-item')}}">
                    <div class="col-xs-offset-1 col-xs-10 admin-option">
                        <p class="centerText" id="upload-item">
                            Upload Item <span class="glyphicon glyphicon-upload"></span>
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="row">
                <a href="{{url('/edit-item/0')}}">
                    <div class="col-xs-offset-1 col-xs-10 admin-option">
                        <p class="centerText" id="edit-item">
                            Edit Item <span class="glyphicon glyphicon-wrench"></span>
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="row">
                <a href="{{url('/set-homepage-item')}}">
                    <div class="col-xs-offset-1 col-xs-10 admin-option">
                        <p class="centerText" id="set-homepage-item">
                            Set Homepage Feature <span class="glyphicon glyphicon-picture"></span>
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div class="row">
                <a href="{{url('/manage-categories')}}">
                    <div class="col-xs-offset-1 col-xs-10 admin-option">
                        <p class="centerText" id="manage-categories">
                            Manage Categories <span class="glyphicon glyphicon-wrench"></span>
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection