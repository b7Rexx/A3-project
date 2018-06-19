@if(\Illuminate\Support\Facades\Request::is('/'))
    <div id="demo" class="carousel slide" data-ride="carousel">

        @else
            <div id="demo" class="carousel slide no-index-carousel" data-ride="carousel">
            @endif
            <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                    <li data-target="#demo" data-slide-to="3"></li>
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