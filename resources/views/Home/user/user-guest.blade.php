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
                <h2 class="p-3"><i class="fa fa-sticky-note"></i> Posts</h2>
                @forelse($posts as $post)
                    @include('Home.Includes.view-post')
                @empty
                    No post available
                @endforelse
            </div>
        </div>
    </div>
@endsection
