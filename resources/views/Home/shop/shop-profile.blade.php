@extends('Home.shopMaster')

@section('title')
    A3 - Shop-Profile-Logged
@endsection

@section('body')
    <div class="bg-content shop-profile">
        <div class="row">
            <div class="col-md-4 order-md-2">
                <div class="p-4">
                    @include('Home.Includes.shop-nav')
                    @include('Home.Includes.shop-profile')
                <h1>Gallery</h1>
                </div>


            </div>
            <div class="col-md-8 order-md-1">
                <h1>ITEMS</h1>
                {{--<form action="{{route('post-shop')}}" method="post" class="post-form form-group p-3 bg-white" enctype="multipart/form-data">--}}
                    {{--@include('Home.Includes.post')--}}
                {{--</form>--}}
            </div>
        </div>
    </div>
@endsection
