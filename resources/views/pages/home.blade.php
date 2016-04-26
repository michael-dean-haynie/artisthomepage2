@extends('layouts/master')

@section('to-master-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
@endsection

@section('to-master-content')
    <div class="feature-container-container">
        <a href="{{url('/feature/' . $homepageItem->itemID)}}">
            <div class="item-container feature-container">
                <img  class="img-responsive home-item" src="{{url('items/'.$homepageItem->fileName)}}">
                <div class="item-info item-info-bottom well well-sm bold">{{$homepageItem->title}}</div>
            </div>
        </a>
    </div>
@endsection

