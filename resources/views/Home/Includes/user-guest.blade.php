<div class="border p-1 profile-image text-center" style="position: relative">
    @include('Home.Includes.message')
    <h3 title="{{$user->name}}"> {{str_limit($user->name,25)}}</h3>
    <img src="{{URL::to('images/user/profile/'.$user->image)}}" alt="NoImage">
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