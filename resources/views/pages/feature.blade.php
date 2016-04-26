@extends('layouts/master')

@section('to-master-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/feature.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin.css')}}">
@endsection

@section('to-master-content')
    <div class="feature-container-container">
        <a class="btn btn-primary my-back-button" href="{{URL::previous()}}">
            <span class="glyphicon glyphicon-menu-left back-glyph"></span>
            <span>Back to category</span>
        </a>
        <div class="item-container feature-container">
            <div class="item-info item-info-top well well-sm bold">{{$featureItem->title}}</div>
            <img  class="img-responsive feature-img" src="{{asset('items/' . $featureItem->fileName)}}">
            <div class="item-info item-info-bottom well well-sm italics">{{$featureItem->info}}</div>
        </div>
        <div class="spacer3rem"></div>
        <div class="row admin-row">
            <div class="col-xs-6">
                <div class="row">
                    <a href="{{url('/edit-item/' . $featureItem->itemID)}}">
                        <div class="col-xs-offset-1 col-xs-10 admin-option">
                            <p class="centerText" id="edit-item">
                                Edit Item <span class="glyphicon glyphicon-wrench"></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="row">
                    <a href="{{url('/admin')}}">
                        <div class="col-xs-offset-1 col-xs-10 admin-option">
                            <p class="centerText" id="upload-item">
                                Feature on Homepage <span class="glyphicon glyphicon-picture"></span>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection