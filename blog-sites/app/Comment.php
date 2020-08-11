<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment','user_id','blog_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function blog()
    {
        return $this->belongsTo(Blog::class,'blog_id');
    }
}
