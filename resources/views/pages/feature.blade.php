@extends('layouts/master')

@section('to-master-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/feature.css')}}">
@endsection

@section('to-master-content')
    <div class="feature-container-container">
        <a class="btn btn-primary my-back-button" href="{{URL::previous()}}">
            <span class="glyphicon glyphicon-menu-left back-glyph"></span>
            <span>Back to category</span>
        </a>
        <div class="item-container feature-container">
            <div class="item-info item-info-top well well-sm bold">{{$featureItem->title}}</div>
            <img  class="img-responsive" src="{{asset('items/' . $featureItem->fileName)}}">
            <div class="item-info item-info-bottom well well-sm italics">{{$featureItem->info}}</div>
        </div>
    </div>
@endsection