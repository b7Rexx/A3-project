<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Shop extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password','phone','bio','image','address'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
