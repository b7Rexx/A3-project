@extends('Home.Master')

@section('title')
    A3 - Shop-Profile
@endsection

@section('body')
    <div class="bg-content shop-profile">
        <div class="row">
            <div class="col-md-4 order-md-2 p-1">
                @include('Home.Includes.shop-nav')
                @include('Home.Includes.shop-profile')
                <h1>Gallery</h1>
            </div>
            <div class="col-md-8 order-md-1">
                <div id="shop-item">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{URL::to('js/vueshop.js')}}"></script>
@endsection