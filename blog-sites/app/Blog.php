<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
      'title',
      'image',
      'video',
      'content',
    ];
    public function blogtypes()
    {
        return $this->belongsToMany('App\BlogType','blog_b_types');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
