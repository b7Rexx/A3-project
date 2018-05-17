@extends('Guest.guestMaster')

@section('title')
    A3 - LOGIN
@endsection

@section('body')
    <div id="login" class="login bg-dark" style="min-height:80vh;">
        <div class="row">
            <div class="col-md-6 mx-auto">
                {{--<router-link to="/" class="btn"> Choose</router-link>--}}
                <login-component></login-component>
                <shop-login-component></shop-login-component>
                <user-login-component></user-login-component>
            </div>
        </div>
    </div>
@endsection