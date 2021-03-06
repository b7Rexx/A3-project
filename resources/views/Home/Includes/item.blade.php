{{--<div class="col-sm-6 col-md-4 col-lg-3 bg-items p-3">--}}
<div title="{{$item->name}}" class="index-items text-center" xmlns:v-on="http://www.w3.org/1999/xhtml"
     xmlns:v-on="http://www.w3.org/1999/xhtml">
    <h4>{{str_limit($item->name,18)}}</h4>
    <img src="{{URL::to('images/shop/item/'.$item->image)}}" alt="Shop image">
    <br>
    {{\App\Item::find($item->id)->category->name}}
</div>
<hr>
<div class="rate">
    <?php
    $rate = 0;$sum = 0;$key = 0;

    foreach ($item->rate as $key => $value) {
        $sum += $value->rate;
    }
    $rate = round($sum / ++$key);
    ?>

    <form class="rate-form" id="rate{{$item->id}}">
        <button class="btn btn-success btn-sm rate-submit" value="{{$item->id}}"> Rate</button>
        {{--{{csrf_field()}}--}}
        {{--<input type="text" class="rate-radio-{{$item->id}}" name="id" value="{{$item->id}}" style="display: none">--}}

        <i class="fa fa-star">
            <input type="radio" class="rate-radio-{{$item->id}}" name="rate" value="1" {{$rate==1?'checked':''}}>
        </i>
        <i class="fa fa-star">
            <input type="radio" class="rate-radio-{{$item->id}}" name="rate" value="2" {{$rate ==2?'checked':''}}>
        </i>
        <i class="fa fa-star">
            <input type="radio" class="rate-radio-{{$item->id}}" name="rate" value="3" {{$rate == 3?'checked':''}}>
        </i>
        <i class="fa fa-star">
            <input type="radio" class="rate-radio-{{$item->id}}" name="rate" value="4" {{$rate ==4?'checked':''}}>
        </i>
        <i class="fa fa-star">
            <input type="radio" class="rate-radio-{{$item->id}}" name="rate" value="5" {{$rate==5?'checked':''}}>
        </i>
    </form>
    <br>
    <a href="{{url('shop/id/'.\App\Item::find($item->id)->shop->id)}}"
       title="{{\App\Item::find($item->id)->shop->name}}">
        <i class="fa fa-map-marker"></i> {{str_limit(\App\Item::find($item->id)->shop->name,25)}}
    </a>
    <br>Available :
    @if($item->status == 'on')
        <i class="fa fa-check-square" style="color:green"></i>
    @elseif($item->status == 'off')
        <i class="fa fa-times" style="color:red"></i>
    @endif
</div>
<br>
<div class="row" style="margin: 0 -5px 0 -15px ">
    <div class="col-sm-6" style="font-size: 12px;">
        Last updated: <br>
{{\Carbon\Carbon::parse($item->updated_at)->diffForHumans()}}
    </div>
    <div class="col-sm-6 text-right">
        Rs. {{$item->price}}<br>
        <i class="fa fa-plus btn btn-warning" v-on:click="addCart({{$item->id}})"> to Cart <i class="fa fa-shopping-cart"> </i></i>
    </div>
</div>
