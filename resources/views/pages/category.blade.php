@extends('layouts/master')

@section('to-master-css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/category.css')}}">
@endsection

@section('to-master-content')
    <div class="newest-oldest-container">
        <a class="btn btn-primary{{$catCurrOrder == 'desc' ? ' disabled' : ''}}"
                href="{{url('/category/' . $catName . '/1/desc')}}">New items first</a>
        <a class="btn btn-primary{{$catCurrOrder == 'asc' ? ' disabled' : ''}}"
           href="{{url('/category/' . $catName . '/1/asc')}}">Old items first</a>
        {{--<button class="btn btn-primary{{$catCurrOrder == 'asc' ? ' disabled' : ''}}">New First</button>--}}
        {{--<button class="btn btn-primary{{$catCurrOrder == 'desc' ? ' disabled' : ''}}">Old First</button>--}}
    </div>
    @include('subviews/nav')
    @include('subviews/selection')
    @include('subviews/nav')
@endsection