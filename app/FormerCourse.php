<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormerCourse extends Model
{
    protected $casts = [
        'books' => 'json'
    ];
}
