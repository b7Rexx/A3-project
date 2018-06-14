@extends('Home.Master')

@section('title')
    A3 - User-Profile
@endsection

@section('body')
    <div class="bg-content shop-profile">
        <div class="row">
            <div class="col-md-4 order-md-2 p-1">
                @include('Home.Includes.user-nav')
                @include('Home.Includes.message')
                @include('Home.Includes.user-profile')
                <h1>Gallery</h1>
            </div>
            <div class="col-md-8 order-md-1">
                @include('Home.Includes.post')
            </div>
        </div>
    </div>
@endsection
