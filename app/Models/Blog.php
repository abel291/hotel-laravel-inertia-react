<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'model');
    }
}
