<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $fillable = [
        'name',
        'occupation',
        'address',
        'post_code',
        'telephone',
        'mobile',
    ];
}
