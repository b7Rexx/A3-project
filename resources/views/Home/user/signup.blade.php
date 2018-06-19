@extends('Home.Master')

@section('title')
    A3 - SignUp
@endsection

@section('body')
    <div class="bg-content">
        <div class="row">
            <div class="col-sm-2 order-sm-3">

            </div>
            <div class="col-sm-4 order-sm-2">
                <br>
                @include('Home.Includes.carousel')
            </div>
            <div class="col-sm-6 order-sm-1 text-center p-3">
                <br><img src="{{url('images/A3logo.png')}}" alt="" style="height: 150px">

            </div>
        </div>  <div class="row">
            <div class="col-md-6 order-md-2">
                <div id="signupuser">
                    <router-view></router-view>
                </div>
            </div>
            <div class="col-md-5 order-md-1 text-center p-4">
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
    <script src="{{URL::to('js/vueloginuser.js')}}"></script>
@endsection
