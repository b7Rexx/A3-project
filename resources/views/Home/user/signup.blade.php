@extends('Home.Master')

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
            </div>
            <div class="col-md-5 order-md-1 text-center">
                <br><img src="{{url('images/A3logo.png')}}" alt=""style="height: 150px">
                <br><br>
                <br><br>
                <a href="{{route('login')}}">
                    <i class="fa fa-shopping-cart fa-3x"></i><br>
                    <h3>Shop Login</h3>
                    <p>Log into A3 Shop and keep display of the new items and get rated by the users!</p>
                </a>
            </div>
        </div>
        {{--<div class="signup-carousel">--}}
            {{--@include('Home.Includes.carousel')--}}
        {{--</div>--}}
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
