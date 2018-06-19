@extends('Home.Master')

@section('title')
    A3 - Browse Items
@endsection

@section('body')
    <div class="bg-content">
        <div class="row">
            <div class="col-sm-4 order-sm-2">
                <br>
                @include('Home.Includes.carousel')
            </div>
            <div class="col-sm-8 order-sm-1">
                <br>
                <input type="text" class="form-control">
            </div>
        </div>
        <br>
        <div class="row">
            @forelse($items as $item)
                <div class="col-sm-6 col-md-4 col-lg-3 bg-items p-3">
                    @include('Home.Includes.item')
                </div>
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
    {{--    <script src="{{URL::to('js/vuelogin.js')}}"></script>--}}
@endsection
