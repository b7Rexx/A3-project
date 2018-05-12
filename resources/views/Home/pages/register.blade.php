@extends('Home.homeMaster')
@section('title')
    {{$mains['short-title']}}- Register
@endsection
@section('body')
    <div class="continer-fuild">
        <br>
        <div class="row">
        {{$mains['title']}}

        <div class="col-md-2 mx-auto">
            <a href="{{route('login')}}">
                <button class="btn btn-warning btn-lg">Login</button>
            </a>
        </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-4 m-auto">
                @include('Home.Includes.message')
                <form action="{{route('register-action')}}" method="post" class="form-group">
                    {{csrf_field()}}

                    <label class="btn btn-primary"><i class="fa fa-user"> User</i> <input type="radio" name="type"
                                                                                          checked></label>
                    <label class="btn btn-primary pull-right"><i class="fa fa-shopping-cart"> Shop</i> <input
                                type="radio" name="type"></label>
                    <br><label><i class="fa fa-user"> Name : </i></label>
                    <input type="text" name="name" class="form-control">
                    <br><label><i class="fa fa-envelope"> Email : </i></label>
                    <input type="email" name="email" class="form-control">
                    <br><label><i class="fa fa-key"> Password : </i></label>
                    <input type="password" name="password" class="form-control">
                    <br><input type="submit" class="btn btn-success pull-right" value="Login">
                </form>

            </div>
        </div>
    </div>
@endsection