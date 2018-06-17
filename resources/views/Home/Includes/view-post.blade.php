<div class="post-block m-2 p-2 bg-white">
    <a href="{{url('/user/id/'.$post->user->id)}}">
        <img src="{{url('images/user/profile/'.$post->user->image)}}" alt="profile" title="{{$post->user->name}}"
             style="height: 50px;width:40px;">
        {{ucfirst($post->user->name)}}
    </a>
    <i class="fa fa-caret-right  p-2"> </i>
    <a href="">{{$post->title}}</a>
    <br>

    <div class="p-2">

        @forelse($post->images as $key=>$image)
            @if($key < 3)
                <a href="#{{$image->id}}">
                    <img src="{{url('images/user/post/'.$image->image)}}" alt="post image"
                         style="height:100px;width:100px">
                </a>
            @elseif($key == 3)
                <a href="#{{$post->id}}">
                    <i class="fa fa-plus-square fa-5x"></i>
                </a>
            @endif
        @empty

        @endforelse

        @forelse($post->Videos as $vkey=>$video)
            @if($vkey < 2)
                <a href="#{{$video->id}}">
                    <iframe width="140" height="110" src="https://www.youtube.com/embed/{{$video->video}}">
                    </iframe>
                </a>
            @elseif($vkey == 2)
                <a href="#{{$post->id}}">
                    <i class="fa fa-plus-square fa-5x"></i>
                </a>
            @endif
        @empty
        @endforelse
    </div>
    <hr>
    {{$post->detail}}


    <div class="text-right text-secondary">
        {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}
    </div>

    {{--comments--}}
    <div class="text-info view-post">
        {{--<a class="small p-2 fa fa-thumbs-up" href="#"> likes</a>--}}
        <a class="small p-2 fa fa-comment comment-button" href="#" post_id="{{$post->id}}"> {{count($post->comment)}}
            comments</a>
        <div class="comment-all comment-{{$post->id}}" style="display: none">
            <div class="bg-white p-1" style="max-height: 200px;overflow-y: scroll">

                @forelse($post->comment as $comment)
                    <i class="pl-2 text-info"><i class="fa fa-user"></i> {{$comment->user->name}}</i><br>
                    <a class="text-secondary"> {{$comment->comment}}</a>
                    <div class="small text-secondary text-right"> {{\Carbon\Carbon::parse($comment->updated_at)->diffForHumans()}}</div>
                    <hr>
                @empty
                    No comment.
                @endforelse
            </div>
            <textarea class="form-control comment-text" style="resize: none"
                      placeholder="Press Enter to comment on post"></textarea>
        </div>
    </div>

</div>

