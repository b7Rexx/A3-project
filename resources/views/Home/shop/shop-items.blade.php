@extends('Home.shopMaster')

@section('title')
    A3 - Shop-Items
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
                <div id="shop-item">
                    <br>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <router-link to="/" class="nav-link active">Show List</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/Add" class="nav-link active">Add Item</router-link>
                        </li>
                    </ul>
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var server = {
            _url: '{{URL::to('/')}}',
            _token: '{{csrf_token()}}',
            _shopid: '{{$shop_id}}'
        };
    </script>
    <script src="{{URL::to('js/vueshop.js')}}"></script>
@endsection