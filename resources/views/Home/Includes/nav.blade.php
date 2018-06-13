<nav class="navbar navbar-expand-lg bg-nav">
    <a href="{{route('home')}}"><img height="45px" src="{{URL::to('images/A3logo.png')}}" alt="Logo">
        All About Aqua</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-list"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav pl-5">
            <li class="nav-item pr-3 active">
                <a class="nav-link" href="{{route('home')}}"> <i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item pr-3 dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Listings
                 </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('shop-list')}}">Shops</a>
                    <a class="dropdown-item" href="#">Users</a>
                    {{--<div class="dropdown-divider"></div>--}}
                    {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                </div>
            </li>

            <li class="nav-item pr-3">
                <a class="nav-link" href="{{route('browse-item')}}">Items</a>
            </li>

            <li class="nav-item pr-3">
                <a class="nav-link" href="#">Posts</a>
            </li>

            <li class="nav-item pr-3">
                <a class="nav-link" href="#">Forum</a>
            </li>

            <li class="nav-item pr-3">
                <a class="nav-link" href="#">Feedback</a>
            </li>
        </ul>
    </div>
</nav>