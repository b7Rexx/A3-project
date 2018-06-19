@extends('Home.Master')

@section('title')
    A3 - Posts
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
            @forelse($posts as $post)
                <div class="col-lg-6">
                    @include('Home.Includes.view-post')
                </div>
            @empty
                No post available
            @endforelse
        </div>
        <div class="row bg-white">
            <br>
            <hr>
            {{$posts->links()}}
        </div>
    </div>
@endsection