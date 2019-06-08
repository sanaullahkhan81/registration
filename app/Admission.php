<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $guarded = [];

    public function student(){

        return $this->belongsTo('App\Student');
    }
}
