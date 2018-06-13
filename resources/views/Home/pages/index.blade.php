@extends('Home.homeMaster')

@section('title')
    A3 - All About Aqua
@endsection

@section('body')
    <div class="bg-content">
        <div class="text-center">
            <br>
            <h3>{{$mains['title']}}</h3>
            <a>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, modi quas? Animi blanditiis.</a>
            <br>
        </div>
        <div class="row">
            <div class="index-carousel text-center" data-aos="fade-right">
                @include('Home.Includes.carousel')
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-4 text-center pl-5 pr-5">
                <div data-aos="fade-up-left" data-aos-duration="1000">
                    <a href="{{route('user-signup')}}">
                        <i class="fa fa-users fa-3x"></i><br>
                        <h3>Login as Users</h3>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam beatae repudiandae.
                    </a>
                </div>
            </div>
            <div class="col-sm-4 text-center pl-5 pr-5">
                <div data-aos="fade-up-left" data-aos-duration="1000">
                    <a href="{{route('login')}}">
                        <i class="fa fa-shopping-cart fa-3x"></i><br>
                        <h3>Login as Shops</h3>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam beatae repudiandae.
                    </a>
                </div>
            </div>
            <div class="col-sm-4 text-center pl-5 pr-5">
                <div data-aos="fade-up-left" data-aos-duration="1000">
                    <a href="{{route('browse-item')}}">
                        <i class="fa fa-search fa-3x"></i><br>
                        <h3>Browse Item</h3>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam beatae repudiandae.
                    </a>
                </div>
            </div>
        </div>

        <div>
            <hr>
            <h1 class="text-center"><i class="fa fa-archive"></i> shop item</h1>
            <br>
            <div class="row">
                @forelse($items as $item)
                    @include('Home.Includes.item')
                @empty
                    No items.
                @endforelse
            </div>
            <div class="row">
                <br>
                <hr>
                {{$items->links()}}
            </div>
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
@endsection
