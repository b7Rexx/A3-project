@extends('Home.homeMaster')

@section('title')
    A3 - Shops
@endsection

@section('body')
    <div class="bg-content">
        <div class="row" style="max-height:150px">
            <div class="col-sm-2">
                @include('Home.Includes.carousel')
            </div>
            <div class="col-sm-9">

            </div>
        </div>
        <br>
        <div class="row">
            @forelse($shops as $shop)
                <div class="col-sm-6 col-md-4 border bg-white p-4">
                    <div class="profile-image">
                        <h3 title="{{$shop->name}}">{{str_limit($shop->name,50)}}</h3>
                        <img src="{{URL::to('images/shop/profile/'.$shop->image)}}" alt="Shop image">
                    </div>
                    <p>
                        <br>
                        <a href="#"> <i class="fa fa-envelope"></i> {{$shop->email}}</a>
                        <br>
                        <i class="fa fa-phone"></i> {{$shop->phone}}
                        <br>
                        <i class="fa fa-map-marker"></i> {{$shop->address}}
                    </p>
                    <hr>
                    <i class="fa fa-sticky-note"></i> {{$shop->bio}}
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

@section('js')
    <script>
        var server = {
            _url: '{{URL::to('/')}}',
            _token: '{{csrf_token()}}'
        };
    </script>
    {{--    <script src="{{URL::to('js/vuelogin.js')}}"></script>--}}
@endsection
