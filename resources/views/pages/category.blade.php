@extends('layouts/master')

@section('to-master-css')
    <link rel="stylesheet" type="text/css" href="css/category.css">
@endsection

@section('to-master-content')
    <div class="newest-oldest-container">
        <button class="btn btn-primary disabled newest">New First</button>
        <button class="btn btn-primary oldest">Old First</button>
    </div>
    @include('subviews/nav')
    @include('subviews/selection')
    @include('subviews/nav')
@endsection