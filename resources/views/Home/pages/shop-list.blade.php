@extends('Home.Master')

@section('title')
    A3 - Shops
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
        <div class="row list">
            @forelse($shops as $shop)
                <div class="col-md-6 p-3">
                    <div class="row bg-white p-2">
                        <div class="col-sm-4 order-sm-2">
                            <img src="{{url('images/shop/profile/'.$shop->image)}}" alt="Image" style="height: 240px">
                        </div>
                        <div class="col-sm-8 order-sm-1">
                            <a href="{{url('shop/id/'.$shop->id)}}">
                                <h4 title="{{$shop->name}}">{{str_limit($shop->name,30)}}</h4>
                            </a>
                            <a href="#"> <i class="fa fa-envelope"></i> {{$shop->email}}</a>
                            &nbsp;&nbsp;&nbsp; <i class="fa fa-phone"></i> {{$shop->phone}}
                            <br>
                            <i class="fa fa-map-marker"></i> {{$shop->address}}
                        </div>
                    </div>
                </div>
            @empty
                No shop available
            @endforelse
        </div>
        <div class="row bg-white">
            <br>
            <hr>
            {{$shops->links()}}

        </div>
    </div>
@endsection