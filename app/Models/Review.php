<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [];
    protected $casts = [
        'ratings' => 'array',
        'submitted_at' => 'datetime'
    ];
}
