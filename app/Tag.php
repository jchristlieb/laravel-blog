<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        // any post may have many tags
        // any tag maybe applied to many posts
        return $this->belongsToMany(Post::class);
    }
}
