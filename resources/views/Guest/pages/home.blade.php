@extends('Guest.guestMaster')

@section('title')
    A3 - HOME
@endsection

@section('body')
    <div class="home">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            {{--<ol class="carousel-indicators">--}}
            {{--<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>--}}
            {{--<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>--}}
            {{--<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
            {{--</ol>--}}
            <div class="carousel-inner">
                @foreach(unserialize($mains['carousel']) as $key=>$img)
                    <div class="carousel-item {{$key == 0 ?'active':''}}">
                        <img class="d-block w-100" src="{{URL::to('images/carousel/'.$img)}}" alt="slide image">
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
            <div class="carousel-overlap-top">
                <br><br><br>
                <h1 class="text-center">A3 <br>All About Aqua</h1>
                <img src="{{URL::to('images/A3logo.png')}}" alt="">
            </div>
            <div class="carousel-overlap-bottom">
                <img src="{{URL::to('images/c2.jpg')}}" alt="image" style="position: relative">
                <a href="/login/home"><h1 class="text-center">Login/Register</h1><h4>Get Access to All the Features <br>with
                        Your own Account</h4></a>
            </div>
        </div>

        <div class="list bg-primary">
            @forelse($shops as $detail)
                <div class="row">
                    <div class="col-sm-5 col-md-3">
                        <img src="{{URL::to('images/uploads/shops/'.$detail->image)}}" alt="No image">
                    </div>
                    <div class="col-sm-7 col-md-6">
                        <a href="/shop/{{$detail->id}}"><h3>{{$detail->name}}</h3>
                            <p>{{$detail->email}}<br>{{$detail->address}}<br>{{$detail->phone}}</p></a>
                    </div>
                    <div class="col-md-3">
                        <p>{{$detail->bio}}</p>
                    </div>
                </div>
            @empty
                <h3>No shop available.</h3>
            @endforelse
        </div>
    </div>
@endsection