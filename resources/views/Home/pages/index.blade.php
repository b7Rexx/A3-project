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
            <br>
            <br>
        </div>
        <div class="row">
            <div class="index-carousel col-md-6" data-aos="fade-right">
                @include('Home.Includes.carousel')
            </div>
            <div class="col-sm-8 col-md-4 p-2 home-shops">
                @forelse($shops as $shop)
                    <div class="row border">
                        <div class="col-sm-4 order-sm-2">
                            <img src="{{url('images/shop/profile'.$shop->image)}}" alt="Image" style="height: 240px">
                        </div>
                        <div class="col-sm-8 order-sm-1">
                            <h4 title="{{$shop->name}}">{{str_limit($shop->name,30)}}</h4>
                            <a href="#"> <i class="fa fa-envelope"></i> {{$shop->email}}</a>
                            <br> <i class="fa fa-phone"></i> {{$shop->phone}}
                            <br>
                            <i class="fa fa-map-marker"></i> {{$shop->address}}
                        </div>
                    </div>
                    <br>
                @empty
                    No available shops.
                @endforelse
            </div>
            <div class="col-sm-4 col-md-2">
                <h2>Forum</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque aut cumque, deleniti ea enim id
                    vero, voluptatem?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aperiam assumenda consequuntur
                    tenetur ullam voluptatum?</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 text-center mid-home">
                <div data-aos="fade-up-left" data-aos-duration="500">
                    <a href="{{route('user-signup')}}">
                        <i class="fa fa-users fa-3x"></i><br>
                        <h3>User Login</h3>
                        <p>Log into A3 account and share abut the aquatic experince with the aqua-mates!</p>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 text-center mid-home">
                <div data-aos="fade-up-left" data-aos-duration="500">
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
                <div data-aos="fade-up-left" data-aos-duration="500">
                    <a href="{{route('browse-item')}}">
                        <i class="fa fa-search fa-3x"></i><br>
                        <h3>Browse Item</h3>
                        <p>Sort and search the most reliable aquatic items found in your nearby shops!</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="p-2">
            <h3><i class="fa fa-archive"></i> Shop items</h3>
            <div class="row">
                @forelse($items as $item)
                    @include('Home.Includes.item')
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


@section('js')
    <script>
        var server = {
            _url: '{{URL::to('/')}}',
            _token: '{{csrf_token()}}'
        };
    </script>
@endsection
