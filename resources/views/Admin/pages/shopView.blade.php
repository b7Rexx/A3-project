@extends('Admin.AdminMaster')

@section('title')
    A3 - Admin View
@endsection

@section('body')
    @include('Admin.Includes.message')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>S/N.</th>
            <th>Shops</th>
            <th>Value</th>
            <th>Editable</th>
        </tr>
        </thead>
        @forelse($shops as $key=>$shop)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$shop->name}}</td>
                <td>{{$shop->email}}</td>
                <td>{{$shop->password}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4"> No available data</td>
            </tr>
        @endforelse
    </table>
@endsection
