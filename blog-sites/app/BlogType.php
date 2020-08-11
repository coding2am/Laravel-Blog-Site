<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogType extends Model
{
    protected $fillable = [
      'name'
    ];
    public function blogs()
    {
        return $this->belongsToMany('App\Blog','blog_b_types');
    }
}
