<div class="post-block m-2 p-2 bg-white">
    <a href="{{url('/')}}">{{ucfirst($post->user->name)}}</a>
    <i class="fa fa-caret-right fa-2x p-2"> </i>
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
</div>