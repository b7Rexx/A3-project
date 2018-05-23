@extends('Guest.guestMaster')

@section('title')
    A3 - TEST
@endsection

@section('body')
    <div class="bg-dark">
        <div id="test">
            @{{message}}
            <input type="text" class="form-control" v-model="message">
            <a v-on:click="clickbait()"> hello</a>
        </div>
    </div>
@endsection