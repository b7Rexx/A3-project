@extends('Home.Master')

@section('title')
    A3 - SignUp
@endsection

@section('body')
    <div class="bg-content">
        <div class="row">
            <div class="col-md-6 order-md-2">
                <div id="signup">
                    <router-view></router-view>
                </div>
            </div>
            <div class="col-md-5 order-md-1 text-center">
                <br><img src="{{url('images/A3logo.png')}}" alt="" style="height: 150px">
                <br><br>
                <br><br>
                <a href="{{route('user-signup')}}">
                    <i class="fa fa-users fa-3x"></i><br>
                    <h3>User Login</h3>
                    <p>Log into A3 account and share abut the aquatic experince with the aqua-mates!</p>
                </a>
            </div>
        </div>
        {{--<div class="signup-carousel">--}}
        {{--@include('Home.Includes.carousel')--}}
        {{--</div>--}}
    </div>
@endsection

@section('js')
    <script src="{{URL::to('js/vuelogin.js')}}"></script>
@endsection
