@extends('Home.homeMaster')

@section('title')
    A3 - All About Aqua
@endsection

@section('body')
    <div class="bg-content">
        <div class="text-center">
            <br>
            <h3>{{$mains['title']}}</h3>
            <a>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, modi quas? Animi blanditiis.</a>
            <br><br>
        </div>
        <div class="row">
            <div class="col-lg-7" data-aos="fade-right">
                @include('Home.Includes.carousel')
            </div>
            <div class="col-lg-5 text-center" data-aos="fade-down">
                <hr>
                <h4>Sign in for more features</h4>
                <hr>
                <a href="{{route('login')}}"><img src="{{URL::to('images/login-image.jpg')}}" alt="Login"></a>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-4 text-center p-5">
                <div data-aos="fade-up-left" data-aos-duration="1000">
                    <a href="">
                        <i class="fa fa-users fa-5x"></i><br>
                        <h3>Users</h3>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam beatae repudiandae.
                    </a>
                </div>
            </div>
            <div class="col-sm-4 text-center p-5">
                <div data-aos="fade-up-left" data-aos-duration="1000">
                    <a href="{{route('shop-profile')}}">
                        <i class="fa fa-shopping-cart fa-5x"></i><br>
                        <h3>Shops</h3>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam beatae repudiandae.
                    </a>
                </div>
            </div>
            <div class="col-sm-4 text-center p-5">
                <div data-aos="fade-up-left" data-aos-duration="1000">
                    <a href="">
                        <i class="fa fa-search fa-5x"></i><br>
                        <h3>Search</h3>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam beatae repudiandae.
                    </a>
                </div>
            </div>
        </div>

        <div>
            <hr>
            <h1 class="text-center"> <i class="fa fa-archive"></i> shop item</h1>
            <br>
            <div class="row">
                @forelse($items as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3 bg-items p-3">
                        <div title="{{$item->name}}" class="index-items text-center">
                            <h4>{{str_limit($item->name,18)}}</h4>
                            <img src="{{URL::to('images/shop/item/'.$item->image)}}" alt="Shop image">
                        </div>
                        <hr>
                        <div class="text-right">
                            Rs. {{$item->price}}
                        </div>
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