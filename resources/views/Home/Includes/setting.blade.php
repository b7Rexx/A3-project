<h3>Profile Settings</h3>
{{csrf_field()}}
<label><i class="fa fa-user"></i> Name : </label>
<input type="text" name="name" class="form-control" value="{{$data->name}}">
<label><i class="fa fa-phone"></i> Phone : </label>
<input type="number" name="phone" class="form-control" value="{{$data->phone}}">
<label><i class="fa fa-map-marker"></i> Address : </label>
<input type="text" name="address" class="form-control" value="{{$data->address}}">
<label><i class="fa fa-info"></i> Bio : </label>
<textarea type="text" name="bio" class="form-control" style="resize: none">{{$data->bio}}</textarea><br>
<button type="submit" class="btn btn-success float-right"
        onclick="confirm('Are you sure you want to update profile info ? ')">
    Update Profile
</button>
