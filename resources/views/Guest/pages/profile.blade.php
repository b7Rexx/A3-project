@extends('Guest.guestMaster')

@section('title')
    A3 - HOME
@endsection

@section('body')
    <div class="profile bg-dark">
        <div class="row flex-row-reverse">
            <div class="col-md-4">
                <div class="image border">
                    @if($profile[0]->image)
                        <img src="{{URL::to('images/profile/'.$profile[0]->image)}}" alt=""
                             style="width:100%;height:95%">
                        <a id="addImage"> <i class="fa fa-camera"></i> Change the profile picture</a>
                    @else
                        <img src="{{URL::to('images/No_image.jpeg')}}" alt="" style="width:100%;height:95%">
                        <a id="addImage"> <i class="fa fa-camera ml-5"></i> Add a profile picture</a>
                    @endif
                </div>
            </div>
            <div class="addImage form-group">
                <h4> Select image to upload <a class="pull-right" id="profileHide">&times;</a></h4>
                <form action="{{route('add-profile-pic')}}" enctype="multipart/form-data" method="post">
                   {{csrf_field()}}
                    <input type="file" class="form-control" name="profile">
                    <input type="text" class="form-control" style="visibility: hidden;" name="model" value="{{$model}}">
                    <input type="text" class="form-control" style="visibility: hidden;" name="id" value="{{$profile[0]->id}}">
                    <input type="submit" class="btn btn-success" value="Make Profile Picture">
                </form>
            </div>
            <div class="col-md-8">
                <h1>POSTS</h1>
            </div>

        </div>
    </div>
@endsection