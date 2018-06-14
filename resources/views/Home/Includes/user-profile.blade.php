<div class="border p-1 profile-image text-center" style="position: relative">
    <h3 title="{{$user->name}}"> {{str_limit($user->name,25)}}</h3>
    <img src="{{URL::to('images/user/profile/'.$user->image)}}" alt="NoImage">
    <a id="image-button" style="position:absolute;bottom: 0;right: 0;background: white;opacity: 0.3;" class="p-2"><i class="fa fa-camera"></i> Update
        profile Picture</a>

</div>
<p>
    <br>
    <a href="#"> <i class="fa fa-envelope"></i> {{$user->email}}</a>
    <br>
    <i class="fa fa-phone"></i> {{$user->phone}}
    <br>
    <i class="fa fa-map-marker"></i> {{$user->address}}
</p>
<hr>
<i class="fa fa-sticky-note"></i> {{$user->bio}}

<form action="{{url('user/id/image')}}" method="post" class="profile-image-form bg-white p-2" enctype="multipart/form-data">
    <h5 class="d-inline">Upload Profile Image<h1 id="image-button-close" class="float-right d-inline">&times;</h1>
    </h5>
    {{csrf_field()}}
    <input type="file" class="form-control" name="image">
    <br>
    <input type="submit" class="btn btn-success btn-sm float-right" value="Upload">
</form>