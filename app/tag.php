<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    public function article() 
    {
        return $this->belongsToMany(Article::class,'article_tag');
    }
    
}
