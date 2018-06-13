<nav class="navbar navbar-expand-lg bg-white">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-list"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav pl-5">
            <li class="nav-item pr-3 active">
                <a class="nav-link" href="{{route('home')}}"> <i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item pr-3">
                <a class="nav-link" href="{{route('shop-profile')}}"> <i class="fa fa-user"></i> Profile</a>
            </li>
            <li class="nav-item pr-3">
                <a class="nav-link" href="{{route('shop-items')}}"> <i class="fa fa-shopping-cart"></i> Shop</a>
            </li>
            <li class="nav-item pr-3 dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <div class="dropdown" style="position: absolute;right:30px;">
                <a class="dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-cogs"> Settings</i></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Edit Profile</a>
                    <a href="{{url('user/logout')}}" class="dropdown-item">Logout</a>
                </div>
            </div>
        </ul>
    </div>
</nav>