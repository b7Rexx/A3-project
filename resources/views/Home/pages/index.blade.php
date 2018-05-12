@extends('Home.homeMaster')

@section('title')
    {{$mains['short-title']}}- Home
@endsection

@section('body')
    {{$mains['title']}}
    <a class="btn btn-danger" href="{{route('logout')}}">Logout</a>
@endsection