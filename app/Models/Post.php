<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'category_id',
        'status',
        'published_at',
        'meta_title',
        'meta_keywords',
        'featured_image',
    ];
}
