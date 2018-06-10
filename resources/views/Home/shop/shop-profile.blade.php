@extends('Home.shopMaster')

@section('title')
    A3 - Shop-Profile
@endsection

@section('body')
    <div class="bg-content shop-profile">
        <div class="row">
            <div class="col-md-4 order-md-2">
                <div class="p-4">
                    @include('Home.Includes.profile-image')
                </div>


            </div>
            <div class="col-md-8 order-md-1">
                <form action="" class="form-group p-3">
                    <h3>POST</h3>
                    <input type="text" class="form-control">
                </form>
            </div>
        </div>
    </div>
@endsection
