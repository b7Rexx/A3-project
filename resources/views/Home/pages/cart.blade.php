@extends('Home.Master')

@section('title')
    A3 - cart
@endsection

@section('body')
    <div class="bg-content">
        <div class="row">
            <div class="col-md-9 bg-white">
                <br>
                <h2><i class="fa fa-shopping-cart"> </i> Cart Items</h2>
                <hr>
                <a href="/item/browse" class="text-warning">
                    Need more items? Go fill the <i class="fa fa-shopping-cart"></i>
                </a>
                <table class="table table-striped border">
                    <tr>
                        <th>s/n</th>
                        <th width="40%">Item</th>
                        <th>Price per unit</th>
                        <th>Quantity</th>
                        <th>Net</th>
                        <th>Remarks</th>
                    </tr>
                    <tr v-if="cartEmpty">
                        <td colspan="6">No cart items.</td>
                    </tr>
                    <tr class="text-right" v-for="(item,index) in cartListData">
                        <td>@{{++index}}</td>
                        <td class="text-left">@{{item.name}}</td>
                        <td>Rs. @{{item.price}}</td>
                        <td contenteditable="true">1</td>
                        <td>Rs. @{{item.price}}</td>
                        <td>
                            <button class="btn btn-sm btn-warning fa fa-times"
                                    v-on:click="removeCartItem(item.id)"></button>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
@endsection

@section('js')
    {{--    <script src="{{URL::to('js/vuelogin.js')}}"></script>--}}
@endsection
