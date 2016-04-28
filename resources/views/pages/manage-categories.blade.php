<?php use \App\Http\Controllers\ViewHelperFunctions as VHF;?>

@extends('layouts/master')

@section('to-master-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/manage-categories.css')}}">
@endsection

@section('to-master-content')
    <div class="row">
        <div class="col-xs-offset-1 col-xs-10">
            <a class="btn btn-primary my-back-button" href="{{url('/admin')}}">
                <span class="glyphicon glyphicon-menu-left back-glyph"></span>
                <span>Admin Dashboard</span>
            </a>
        </div>
        <div class="col-xs-offset-2 col-xs-8 form-slate">
            @include('subviews/validation-errors')
            @include('subviews/validation-success')
            @if(count($allCategories) > 1)
                <p class="fs3rem">Edit Existing Category</p>
                <ul class="list-group">
                    @foreach($allCategories as $row)
                        @if($row->canEdit > 0)
                            {{--<a href="{{url('/edit-category')}}">--}}
                                {{--<li class="list-group-item">{{$row->name}}</li>--}}
                            {{--</a>--}}
                            <a href="{{url('/edit-category/' . $row->catID)}}" class="list-group-item">
                                {{$row->name}}
                            </a>
                        @endif
                    @endforeach
                </ul>
            @endif

            <form method="post" action="{{url('/add-category')}}">
                {!! csrf_field() !!}

                <p class="fs3rem">Add New Category</p>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Category Name">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success form-control" id="submit" name="submit" value="Add New Category">
                </div>
            </form>
        </div>
    </div>
@endsection