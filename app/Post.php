<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'user_id', 'title', 'detail'
    ];

    public function images()
    {
        return $this->hasMany(PostImages::class, 'post_id');
    }

    public function videos()
    {
        return $this->hasMany(PostVideos::class, 'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
