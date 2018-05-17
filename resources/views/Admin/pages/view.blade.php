@extends('Admin.AdminMaster')

@section('title')
    A3 - Admin View
@endsection

@section('style-css')
    table{
    table-layout: fixed;
    width: 100%;
    word-wrap:break-word;
    }
@endsection

@section('body')
    @include('Admin.Includes.message')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>S/N.</th>
            <th>Name</th>
            <th>Value</th>
            <th>Editable</th>
        </tr>
        </thead>
        <?php $i = 1?>
        @forelse($mains as $main)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$main->name}}</td>
                <td>{{$main->value}}</td>
                <td>
                    <a href="{{route('admin-delete')}}?id={{$main->id}}">
                        <button class="btn btn-warning btn-sm delete-main"
                                onclick="confirm('delete this data ?')">
                            <i class="fa fa-trash fa-2x"></i>
                        </button>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4"> No available data</td>
            </tr>
        @endforelse
    </table>
@endsection
