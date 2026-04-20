<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'project_technologies')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'project_categories')->withTimestamps();
    }
}
