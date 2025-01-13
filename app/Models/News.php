<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'published_on' => 'datetime',
    ];

    protected $dates = [
        'published_on'
    ];
}
