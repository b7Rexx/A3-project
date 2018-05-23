@extends('Guest.guestMaster')

@section('title')
    A3 - SHOPS
@endsection

@section('body')
    <div class="shop-list">
        <div id="carouselExampleIndicators" class="carousel slide bg-dark" data-ride="carousel">
            <div class="carousel-inner">
                @foreach($shop_carousel as $key=>$shop)
                    <div class="carousel-item {{$key == 0 ?'active':''}}">
                        <img class="d-block w-100" src="{{URL::to('images/carousel/'.$shop->image)}}" alt="slide image">
                        <h1 style="display: inline">{{$key}} ok </h1>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="list bg-primary">
            @forelse($shop_list as $list)
                <div class="row">
                    <div class="col-sm-5 col-md-3">
                        <img src="{{URL::to('images/uploads/shops/'.$list->image)}}" alt="No image">
                    </div>
                    <div class="col-sm-7 col-md-6">
                        <a href="/shop/{{$list->id}}"><h3>{{$list->name}}</h3>
                            <p>{{$list->email}}<br>{{$list->address}}<br>{{$list->phone}}</p></a>
                    </div>
                    <div class="col-md-3">
                        <p>{{$list->bio}}</p>
                    </div>
                </div>
            @empty
                <h3>No shop available.</h3>
            @endforelse
        </div>
    </div>
@endsection