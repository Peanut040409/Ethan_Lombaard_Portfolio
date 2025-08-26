<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function images()
    {
        return $this->belongsToMany(Image::class);
    }
}


