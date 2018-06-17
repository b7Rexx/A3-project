@extends('Home.Master')

@section('title')
    A3 - Posts
@endsection

@section('body')
    <div class="bg-content">
        <div class="row" style="max-height:150px">
            <div class="col-sm-2">
                <h3>ADs</h3>
                @include('Home.Includes.carousel')
            </div>
            <div class="col-sm-9">
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