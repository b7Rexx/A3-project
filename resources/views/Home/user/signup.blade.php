@extends('Home.homeMaster')

@section('title')
    A3 - SignUp
@endsection

@section('body')
    <div class="bg-content">
        <div class="row">
            <div class="col-md-6 order-md-2">
                <div id="signupuser">
                    <router-view></router-view>
                </div>

                <div class="text-center">
                    <a href="{{route('login')}}"><i class="fa fa-shopping-cart fa-3x"></i> <h3> Sign in to Shop</h3></a>
                </div>
            </div>
            <div class="col-md-6 order-md-1 text-center">
                <hr>
                <h4>Sign in for more features</h4>
                <hr>
                @include('Home.Includes.carousel')
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
    <script src="{{URL::to('js/vueloginuser.js')}}"></script>
@endsection
