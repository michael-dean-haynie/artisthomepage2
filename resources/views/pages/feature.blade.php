@extends('layouts/master')

@section('to-master-css')
    <link rel="stylesheet" type="text/css" href="css/feature.css">
@endsection

@section('to-master-content')
    @include('subviews/feature-nav')
    <div class="feature-container-container">
        <div class="item-container feature-container">
            <div class="item-info item-info-top well well-sm">This is the title</div>
            <img  class="img-responsive" src="test-img/img8.jpg">
            <div class="item-info item-info-bottom well well-sm">This is some info</div>
        </div>
    </div>
    @include('subviews/feature-nav')
@endsection