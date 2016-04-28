<?php use \App\Http\Controllers\ViewHelperFunctions as VHF;?>

@extends('layouts/master')

@section('to-master-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/edit-category.css')}}">
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-offset-1 col-xs-10">
            <a class="btn btn-primary my-back-button" href="{{url('/manage-categories')}}">
                <span class="glyphicon glyphicon-menu-left back-glyph"></span>
                <span>Manage Categories</span>
            </a>
        </div>
        <div class="col-xs-offset-2 col-xs-8 form-slate">
            <p class="fs3rem">Edit Category</p>
            @include('subviews/validation-errors')
            @include('subviews/validation-success')
            <form method="post" action="{{url('/update-category')}}">
                {!! csrf_field() !!}
                <input type="hidden" name="catID" id="catID" value="{{$category->catID}}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success form-control" id="submit" name="submit" value="Update Category">
                </div>
            </form>
            <div class="spacer3rem"></div>
            <hr>
            <form method="post" action="{{url('/delete-category')}}">
                {!! csrf_field() !!}
                <input type="hidden" name="catID" id="catID" value="{{$category->catID}}">
                <div class="form-group">
                    <label for="categories" class="redText">Danger Area!</label>
                    <div class="alert alert-danger">
                        <input type="checkbox" name="delete-category" id="delete-category" value="delete-category">
                        I want to delete this category for good.
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-danger form-control" id="submit" name="submit" value="Delete Category">
                </div>
            </form>
        </div>
    </div>
@endsection