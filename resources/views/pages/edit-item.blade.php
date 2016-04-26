<?php use \App\Http\Controllers\ViewHelperFunctions as VHF;?>

@extends('layouts/master')

@section('to-master-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/edit-item.css')}}">
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-offset-1 col-xs-10">
            <a class="btn btn-primary my-back-button" href="{{URL::previous()}}">
                <span class="glyphicon glyphicon-menu-left back-glyph"></span>
                <span>Back</span>
            </a>
        </div>
        @if($editingItemID == 0)
            <div class="col-xs-offset-1 col-xs-10">
                <div class="alert alert-danger">
                    <ul>
                        <li>Oops! You need to select an item to edit!</li>
                    </ul>
                </div>
                <a class="btn btn-success my-back-button" href="{{url('/category/category-1/1/desc')}}">
                    <span class="glyphicon glyphicon-search back-glyph"></span>
                    <span>Select an item</span>
                </a>
            </div>
        @else
            <div class="col-xs-offset-2 col-xs-8 form-slate">
                <form method="post" action="{{url('/edit-item')}}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="editingItemID" id="editingItemID" value="{{$editingItemID}}">
                    <input type="hidden" name="update-or-delete" id="update-or-delete" value="update">

                    <p class="fs3rem">Edit Item</p>

                    @include('subviews/validation-errors')
                    @include('subviews/validation-success')
                    <div class="item-container feature-container">
                        <img  class="img-responsive feature-img" src="{{asset('items/' . $editingItem->fileName)}}">
                    </div>

                    <div class="spacer3rem"></div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$editingItem->title}}">
                    </div>

                    <div class="form-group">
                        <label for="info">Info <small>(Optional)</small></label>
                        <input type="text" class="form-control" id="info" name="info" value="{{$editingItem->info}}">
                    </div>

                    <div class="form-group">
                        <label for="categories">Categories <small>(Select all that apply)</small></label>
                        <div class="well well-sm">
                            @foreach($allCategories as $category)
                                <?php $htmlName = VHF::catIDToHtmlName($category->catID);?>
                                @if(!$category->canEdit)
                                    <input type="hidden" name="{{$htmlName}}" id="{{$htmlName}}" value="{{$htmlName}}">
                                @endif
                                <input type="checkbox" name="{{$htmlName}}" id="{{$htmlName}}" value="{{$htmlName}}"
                                        {{in_array($category->catID, $editingItemsCategories) ? ' checked' : ''}}
                                        {{$category->canEdit == 0 ? ' disabled': ''}}>{{$category->name}}<br>
                            @endforeach
                        </div>
                    </div>

                    <input type="submit" class="btn btn-success form-control" id="submit" name="submit" value="Update">
                </form>
                <div class="spacer3rem"></div>
                <hr>
                <form method="post" action="{{url('/edit-item')}}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="editingItemID" id="editingItemID" value="{{$editingItemID}}">
                    <input type="hidden" name="update-or-delete" id="update-or-delete" value="delete">
                    <div class="form-group">
                        <label for="categories" class="redText">Danger Area!</label>
                        <div class="alert alert-danger">
                            <input type="checkbox" name="delete-item" id="delete-item" value="delete-item">
                            I want to delete this item for good.
                        </div>
                    </div>
                    <input type="submit" class="btn btn-danger form-control" id="submit" name="submit" value="Delete">
                </form>
            </div>
        @endif

    </div>
@endsection