@extends('Home.Master')

@section('title')
    A3 - All About Aqua
@endsection

@section('body')
    <div class="bg-content">
        <div class="text-center">
            <br>
            <h3>{{$mains['title']}}</h3>
            <a>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, modi quas? Animi blanditiis.</a>
            <br>
            <br>
        </div>
        <div class="row">
            <div class="index-carousel col-lg-7 col-md-6">
                @include('Home.Includes.carousel')
            </div>
            <div class="col-lg-5 col-md-6 p-2 home-shops">
                {{--<div class="row">--}}
                {{--<div class="col-sm-8">--}}
                <h4>Featured Shops</h4>
                <hr>
                @forelse($shops as $shop)
                    <div class="row border bg-white">
                        <div class="col-sm-4 order-sm-2 p-1">
                            <img src="{{url('images/shop/profile/'.$shop->image)}}" alt="Image"
                                 style="height: 100px;width:80px">
                        </div>
                        <div class="col-sm-8 order-sm-1">
                            <h4 title="{{$shop->name}}">{{str_limit($shop->name,25)}}</h4>
                            <a href="#"> <i class="fa fa-envelope"></i> {{$shop->email}}</a>
                            <br> <i class="fa fa-phone"></i> {{$shop->phone}}
                            <br>
                            <i class="fa fa-map-marker"></i> {{str_limit($shop->address,25)}}
                        </div>
                    </div>
                    <br>
                @empty
                    No available shops.
                @endforelse
                {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-md-4 order-md-2">
                {{--<div class="col-sm-4">--}}
                <h4>Popular Disccussions </h4>
                <hr>
                <p class="border bg-white p-2"><i class="fa fa-question-circle"></i> Lorem ipsum dolor sit amet,
                    consectetur adip
                    vero, voluptatem?</p>
                <p class="border bg-white p-2"><i class="fa fa-question-circle"></i> Lorem ipsum dolor sit amet,
                    consectetur adip
                    tenetur ullam voluptatum?</p>
            </div>
            <div class="col-md-8 order-md-1">
                <div class="row">
                    <div class="col-sm-6 text-center mid-home">
                        <div>
                            <a href="{{route('user-signup')}}">
                                <i class="fa fa-users fa-3x"></i><br>
                                <h3>User Login</h3>
                                <p>Log into A3 account and share abut the aquatic experince with the aqua-mates!</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center mid-home">
                        <div>
                            <a href="{{route('login')}}">
                                <i class="fa fa-shopping-cart fa-3x"></i><br>
                                <h3>Shop Login</h3>
                                <p>Log into A3 Shop and keep display of the new items and get rated by the users!</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center mid-home">
                        <img src="{{url('images/A3logo.png')}}" alt="">

                    </div>
                    <div class="col-sm-6 text-center mid-home">
                        <div>
                            <a href="{{route('browse-item')}}">
                                <i class="fa fa-search fa-3x"></i><br>
                                <h3>Browse Item</h3>
                                <p>Sort and search the most reliable aquatic items found in your nearby shops!</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-2">
            <h3><i class="fa fa-archive"></i> Shop items</h3>
            <div class="row">
                @forelse($items as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3 bg-items p-3">
                        @include('Home.Includes.item')
                    </div>
                @empty
                    No items.
                @endforelse
            </div>
            <div class="row">
                <br>
                <hr>
                {{$items->links()}}
            </div>
        </div>
    </div>
@endsection
