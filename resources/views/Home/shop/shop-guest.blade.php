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
                <h1>Items List</h1>

                <div class="row">
                    @forelse($items as $item)
                        <div class="col-sm-6 col-lg-4 bg-items p-3">
                            @include('Home.Includes.item')
                        </div>
                    @empty
                        NO item available.
                    @endforelse
                </div>
                <div class="row bg-white">
                    <br>
                    <hr>
                    {{$items->links()}}

                </div>
            </div>
        </div>
    </div>

@endsection