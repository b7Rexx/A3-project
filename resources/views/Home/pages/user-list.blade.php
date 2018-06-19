@extends('Home.Master')

@section('title')
    A3 - Users
@endsection

@section('body')
    <div class="bg-content">
        <div class="row">
            <div class="col-sm-4 order-sm-2">
                <br>
                @include('Home.Includes.carousel')
            </div>
            <div class="col-sm-8 order-sm-1">
                <br>
                <input type="text" class="form-control">
            </div>
        </div>
        <br>
        <div class="row list">
            @forelse($users as $user)
                <div class="col-md-6 p-3">
                    <div class="row bg-white p-2">
                        <div class="col-sm-4 order-sm-2">
                            <img src="{{url('images/user/profile/'.$user->image)}}" alt="Image" style="height: 240px">
                        </div>
                        <div class="col-sm-8 order-sm-1">
                            <a href="{{url('user/id/'.$user->id)}}">
                                <h4 title="{{$user->name}}">{{str_limit($user->name,30)}}</h4>
                            </a>
                                <a href="#"> <i class="fa fa-envelope"></i> {{$user->email}}</a>
                            &nbsp;&nbsp;&nbsp;<i class="fa fa-phone"></i> {{$user->phone}}
                            <br>
                            <i class="fa fa-map-marker"></i> {{$user->address}}
                        </div>
                    </div>
                </div>
            @empty
                No user available
            @endforelse
        </div>
        <div class="row bg-white">
            <br>
            <hr>
            {{$users->links()}}

        </div>
    </div>
@endsection