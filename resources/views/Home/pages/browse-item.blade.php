@extends('Home.Master')

@section('title')
    A3 - Browse Items
@endsection

@section('body')
    <div class="bg-content">
        <div class="row" style="max-height:150px">
            <div class="col-sm-2">
                @include('Home.Includes.carousel')
            </div>
            <div class="col-sm-9">

            </div>
        </div>
        <br>
        <div class="row">
            @forelse($items as $item)
                @include('Home.Includes.item')
            @empty
                No item available
            @endforelse
        </div>
        <div class="row bg-white">
            <br>
            <hr>
            {{$items->links()}}
        </div>
    </div>
@endsection

@section('js')
    <script>
        var server = {
            _url: '{{URL::to('/')}}',
            _token: '{{csrf_token()}}'
        };
    </script>
    {{--    <script src="{{URL::to('js/vuelogin.js')}}"></script>--}}
@endsection
