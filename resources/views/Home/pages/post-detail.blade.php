@extends('Home.Master')

@section('title')
    A3 - Post Detail
@endsection

@section('body')
    <div class="bg-content">
        <div class="row" style="max-height:150px">
            <div class="col-sm-2">
                <h3>ADs</h3>
                @include('Home.Includes.carousel')
            </div>
            <div class="col-sm-9">
            </div>
        </div>
        <br>
        <div class="row">
            @include('Home.Includes.view-post')
        </div>
    </div>
@endsection