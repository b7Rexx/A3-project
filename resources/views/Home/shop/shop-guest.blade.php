@extends('Home.Master')

@section('title')
    A3 - Shop-Guest
@endsection

@section('body')
    <div class="bg-content shop-profile">
        <div class="row">
            <div class="col-md-4 order-md-2 p-1">
                @include('Home.Includes.profile-guest')
                <h1>Gallery</h1>
            </div>
            <div class="col-md-8 order-md-1">
            </div>
        </div>
    </div>

@endsection

{{--@section('js')--}}
{{--<script>--}}
{{--var server = {--}}
{{--_url: '{{URL::to('/')}}',--}}
{{--_token: '{{csrf_token()}}',--}}
{{--_shopid: '{{$shop_id}}'--}}
{{--};--}}
{{--</script>--}}
{{--<script src="{{URL::to('js/vueshop.js')}}"></script>--}}
{{--@endsection--}}