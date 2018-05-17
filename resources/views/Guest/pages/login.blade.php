@extends('Guest.guestMaster')

@section('title')
    A3 - LOGIN
@endsection

@section('body')
    <div id="login" class="login bg-primary" style="min-height:80vh;">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 class="text-center">A3</h1>
                <h4 class="text-center">All About Aqua</h4>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda nam vitae. Ab accusamus dolores,
                esse excepturi, fugit illum laborum magnam molestias mollitia natus sed suscipit voluptate, voluptatum?
                Iusto, quos?
                <hr>

                <div class="vue-login">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
@endsection