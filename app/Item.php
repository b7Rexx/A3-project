<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = [
        'name', 'category_id', 'shop_id', 'price', 'status','image'
    ];
}
