@extends('Home.userMaster')

@section('title')
    A3 - User-Profile
@endsection

@section('body')
    <div class="bg-content shop-profile">
        <div class="row">
            <div class="col-md-4 order-md-2">
                <div class="p-4">
                    @include('Home.Includes.user-nav')
                    @include('Home.Includes.user-profile')
                </div>


            </div>
            <div class="col-md-8 order-md-1">
                <form action="{{route('post-user')}}" method="post" class="post-form form-group p-3 bg-white" enctype="multipart/form-data">
                @include('Home.Includes.post')
                </form>
            </div>
        </div>
    </div>
@endsection
