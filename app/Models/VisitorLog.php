<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    use HasFactory;

    protected $guarded = [];

    const CREATED_AT = 'visited_at';
    const UPDATED_AT = null;
}
