<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostVideos extends Model
{
    protected $table = 'postvideos';
    protected $fillable = [
        'post_id', 'video', 'caption'
    ];
}
