<div class="border p-1 profile-image text-center" style="position: relative">
    @include('Home.Includes.message')
    <h3 title="{{$shop->name}}"> {{str_limit($shop->name,25)}}</h3>
    <img src="{{URL::to('images/shop/profile/'.$shop->image)}}" alt="NoImage">
    <a id="image-button" style="position:absolute;bottom: 0;right: 0;background: white;opacity: 0.3;" class="p-2"><i class="fa fa-camera"></i> Update
        profile Picture</a>

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

<form action="{{route('shop-profile-image-upload')}}" method="post" class="profile-image-form bg-white p-2" enctype="multipart/form-data">
    <h5 class="d-inline">Upload Profile Image<h1 id="image-button-close" class="float-right d-inline">&times;</h1>
    </h5>
    {{csrf_field()}}
    <input type="file" class="form-control" name="image">
    <br>
    <input type="submit" class="btn btn-success btn-sm float-right" value="Upload">
</form>