@extends('layouts/master')

@section('to-master-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
@endsection

@section('to-master-content')
    <div class="feature-container-container">
        <div class="item-container feature-container">
            <img  class="img-responsive" src="test-img/img8.jpg">
            <div class="item-info item-info-bottom well well-sm">This is a title</div>
        </div>
    </div>
@endsection
