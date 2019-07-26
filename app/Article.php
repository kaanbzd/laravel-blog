<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
    public function tag()
    {
        return $this->belongsToMany(Tag::class,'article_tag');
    }
}
