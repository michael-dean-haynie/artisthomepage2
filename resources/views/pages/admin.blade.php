@extends('layouts/master')

@section('to-master-css')
    <link rel="stylesheet" type="text/css" href="css/admin.css">
@endsection

@section('to-master-content')
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
    </div>
@endsection