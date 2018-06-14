@extends('Home.Master')

@section('title')
    A3 - User-Guest
@endsection

@section('body')
    <div class="bg-content shop-profile">
        <div class="row">
            <div class="col-md-4 order-md-2 p-1">
                    @include('Home.Includes.user-guest')
                <h1>Gallery</h1>
            </div>
            <div class="col-md-8 order-md-1">
                {{--<form action="{{route('post-user')}}" method="post" class="post-form form-group p-3 bg-white" enctype="multipart/form-data">--}}
                {{--@include('Home.Includes.post')--}}
                {{--</form>--}}

           <h1>GUEST</h1>
                <h1>POSTS</h1>
            </div>
        </div>
    </div>
@endsection
