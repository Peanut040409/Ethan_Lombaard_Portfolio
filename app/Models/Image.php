<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['source', 'category', 'subtype', 'alt_text'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
