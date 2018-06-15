@extends('Home.Master')

@section('title')
    A3 - Settings
@endsection

@section('body')
    <div class="bg-content">
        <div class="row">
            <div class="col-sm-6 order-sm-2 profile-image p-2">
                <img src="{{url('images/user/profile/'.$data->image)}}" alt="">
                @include('Home.Includes.message')
            </div>
            <div class="col-sm-6 order-sm-1 p-5">
                <form action="{{url('user/setting')}}" method="post">
                    @include('Home.Includes.setting')
                </form>
                <br><br>
                <hr>
                <form action="">
                    <h3>Privacy Settings</h3>
                    <input type="text">
                </form>
            </div>
        </div>
        <div class="text-right p-5">
            <a onclick="window.history.back()" class="btn btn-secondary btn-lg">Back</a>
        </div>
    </div>
@endsection