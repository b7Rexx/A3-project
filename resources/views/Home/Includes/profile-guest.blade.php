<div class="border p-1 profile-image text-center" style="position: relative">
    @include('Home.Includes.message')
    <h3 title="{{$shop->name}}"> {{str_limit($shop->name,25)}}</h3>
    <img src="{{URL::to('images/shop/profile/'.$shop->image)}}" alt="NoImage">
</div>
<p>
    <br>
    <a href="#"> <i class="fa fa-envelope"></i> {{$shop->email}}</a>
    <br>
    <i class="fa fa-phone"></i> {{$shop->phone}}
    <br>
    <i class="fa fa-map-marker"></i> {{$shop->address}}
</p>
<hr>
<i class="fa fa-sticky-note"></i> {{$shop->bio}}
