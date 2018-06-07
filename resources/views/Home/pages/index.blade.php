@extends('Home.homeMaster')

@section('title')
    A3 - All About Aqua
@endsection

@section('body')
    <div class="bg-content">
        <div class="text-center">
            <br>
            <h3>{{$mains['title']}}</h3>
            <a>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, modi quas? Animi blanditiis.</a>
            <br><br>
        </div>
        <div class="row">
            <div class="col-md-8" data-aos="fade-right">
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        @forelse(unserialize($mains['carousel']) as $key=>$image)
                            <div class="carousel-item {{$key == 0?'active':''}}">
                                <img src="{{URL::to('images/carousel/'.$image)}}" alt="Los Angeles">
                            </div>
                        @empty
                            <div class="carousel-item active">
                                <img src="{{URL::to('images/A3.jpg')}}">
                            </div>
                        @endforelse
                    </div>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
            </div>
            <div class="col-md-4 text-center" data-aos="fade-down">
                <hr>
                <h4>Sign in for more features</h4>
                <hr>
                <a href=""><img src="{{URL::to('images/login-image.jpg')}}" alt="Login"></a>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-4 text-center p-5">
                <div data-aos="fade-up-left" data-aos-duration="1000">
                    <a href="">
                        <i class="fa fa-users fa-5x"></i><br>
                        <h3>Users</h3>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam beatae repudiandae.
                    </a>
                </div>
            </div>
            <div class="col-sm-4 text-center p-5">
                <div data-aos="fade-up-left" data-aos-duration="1000">
                    <a href="">
                        <i class="fa fa-shopping-cart fa-5x"></i><br>
                        <h3>Shops</h3>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam beatae repudiandae.
                    </a>
                </div>
            </div>
            <div class="col-sm-4 text-center p-5">
                <div data-aos="fade-up-left" data-aos-duration="1000">
                    <a href="">
                        <i class="fa fa-search fa-5x"></i><br>
                        <h3>Search</h3>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam beatae repudiandae.
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            SHOPS CONTENT
        </div>
    </div>
@endsection