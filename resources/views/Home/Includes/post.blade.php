<form action="{{route('post-user')}}" method="post" class="post-form form-group p-3 bg-white"
      enctype="multipart/form-data">

    <h3 class="text-center"> POST</h3>
    <div class="text-right p-1">
        <i>Add images or videos : </i>
        <button class="fa fa-image btn btn-primary" id="post-image-button" title="Add Images"></button>
        <button class="fa fa-video-camera btn btn-primary" id="post-video-button" title="Add Videos"></button>
    </div>

    <button class="btn btn-primary" type="submit"> POST</button>
    <br>
    {{csrf_field()}}
    <br>
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-header"></i></div>
        </div>
        <input type="text" name="title" class="form-control" id="inlineFormInputGroup" placeholder="Title" required>
    </div>

    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-info"></i></div>
        </div>
        <textarea type="text" name="description" class="form-control" id="inlineFormInputGroup"
                  placeholder="Description"
                  style="resize: none" required></textarea>
    </div>

    {{--<div class="input-group mb-2" id="post-image">--}}
    {{--<div class="input-group-prepend">--}}
    {{--<div class="input-group-text"><i class="fa fa-image"></i></div>--}}
    {{--</div>--}}
    {{--<input type="file" name="image" class="form-control" id="inlineFormInputGroup" placeholder="image" multiple>--}}
    {{--</div>--}}

    {{--<div class="input-group mb-2" id="post-video">--}}
    {{--<div class="input-group-prepend">--}}
    {{--<div class="input-group-text"><i class="fa fa-video-camera"></i></div>--}}
    {{--</div>--}}
    {{--<input type="text" name="video" class="form-control" id="inlineFormInputGroup" placeholder="video URL">--}}
    {{--</div>--}}

</form>
