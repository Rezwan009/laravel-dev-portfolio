<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function blog_posts()
    {
        return $this->belongsToMany(BlogPost::class, 'blog_post_tags');
    }
}
