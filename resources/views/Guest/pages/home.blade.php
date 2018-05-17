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
                <img src="{{URL::to('images/guest-cover.jpg')}}" alt="image" style="position: relative">
                <a href="#" style="position: absolute;left:0;"><h2>Get Access to All the Features <br>with Your own Account</h2></a>
            </div>
        </div>
    </div>
@endsection