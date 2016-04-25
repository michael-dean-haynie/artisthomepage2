<?php use \App\Http\Controllers\ViewHelperFunctions as VHF;?>

@extends('layouts/master')

@section('to-master-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/upload-item.css')}}">
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-offset-2 col-xs-8 form-slate">
            <form enctype="multipart/form-data" method="post" action="{{url('/upload-item')}}">
                {!! csrf_field() !!}

                <p class="fs3rem">Upload Item</p>
                @include('subviews/validation-errors')
                @include('subviews/validation-success')
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="info">Info <small>(Optional)</small></label>
                    <input type="text" class="form-control" id="info" name="info" placeholder="Any other relevant info">
                </div>
                <div class="form-group">
                    <label for="categories">Categories <small>Select all that apply</small></label>
                    <div class="well well-sm">
                        @foreach($allCategories as $category)
                            <?php $htmlName = VHF::catIDToHtmlName($category->catID);?>
                            @if(!$category->canEdit)
                                <input type="hidden" name="{{$htmlName}}" id="{{$htmlName}}" value="{{$htmlName}}">
                            @endif
                            <input type="checkbox" name="{{$htmlName}}" id="{{$htmlName}}" value="{{$htmlName}}"
                                   {{$category->canEdit == 0 ? 'checked disabled': ''}}>{{$category->name}}<br>
                        @endforeach
                    </div>
                </div>


                <input type="submit" class="btn btn-primary form-control" id="submit" name="submit" value="Upload">
            </form>
        </div>
    </div>
@endsection