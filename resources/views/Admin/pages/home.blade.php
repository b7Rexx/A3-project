@extends('Admin.AdminMaster')

@section('title')
    A3 - Admin
@endsection

@section('body')
    @include('Admin.Includes.message')
    <div class="container">
        <div class="col-md-6">
            <h3>Main Database Entry</h3>
            <form action="{{route('admin-action')}}" method="post">
                {{csrf_field()}}
                <span>Name : </span><input class="form-control " type="text" name="name">
                <span>Value : </span><input class="form-control" type="text" name="value">
                <br>
                <button type="submit" class="btn btn-success form-control">OK !</button>
            </form>
        </div>
    </div>
@endsection