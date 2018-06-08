@extends('Admin.AdminMaster')
@section('title')
    A3 - Carousel
@endsection

@section('page-sub-title')
    Carousel
@endsection

@section('body')
    <div class="col-md-6">
        @include('Admin.Includes.message')
        <form action="{{route('carousel-action')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <Label> Carousel : </Label><input type="file" class="form-control" name="carousel[]" multiple><br>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
@endsection
