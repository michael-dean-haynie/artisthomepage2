<?php use \App\Http\Controllers\ViewHelperFunctions as VHF;?>

@extends('layouts/master')

@section('to-master-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/set-homepage-item.css')}}">
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-offset-2 col-xs-8 form-slate">
            @include('subviews/validation-errors')
            @include('subviews/validation-success')
            <p class="fs2rem">Current Homepage Feature</p>
            @if($homepageIsRandom)
                <div class="alert alert-success">
                    <ul>
                        <li>
                            <p class="fs1p5rem"><span class="bold">Random</span><br><small>Feature will be selected at random</small></p>
                        </li>
                    </ul>
                </div>
            @else
                <div class="item-container feature-container">
                    <a href="{{url('/feature/' . $homepageItem->itemID)}}">
                        <div class="item-info item-info-top well well-sm bold">{{$homepageItem->title}}</div>
                        <img  class="img-responsive feature-img" src="{{asset('items/' . $homepageItem->fileName)}}">
                        <div class="item-info item-info-bottom well well-sm italics">{{$homepageItem->info}}</div>
                    </a>
                </div>
                <div class="spacer3rem"></div>
                <hr>
                <form method="post" action="{{url('/set-homepage-item')}}">
                    {!! csrf_field() !!}
                    <label for="homepage-itemID">Randomize Homepage Feature</label>
                    <div class="well well-sm">
                            <input type="checkbox" name="homepage-itemID" id="homepage-itemID" value="0">
                            Select at random from all items
                    </div>

                    <input type="submit" class="btn btn-success form-control" id="submit" name="submit" value="Randomize Homepage Feature">
                </form>
            @endif
            <div class="spacer3rem"></div>
            <hr>
            <a class="btn btn-primary my-back-button" href="{{url('category/category-1/1/desc')}}">
                <span class="glyphicon glyphicon-menu-left back-glyph"></span>
                <span>Select new item for homepage feature</span>
            </a>
        </div>
    </div>
@endsection