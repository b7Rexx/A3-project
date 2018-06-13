@extends('Home.homeMaster')

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

                <div class="text-center">
                    <a href="{{route('user-signup')}}"><i class="fa fa-user fa-3x"></i> <h3> Sign in as User</h3></a>
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
    <script src="{{URL::to('js/vuelogin.js')}}"></script>
@endsection
