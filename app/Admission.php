<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    public $fillable=['student_id'];

    public function student(){

        return $this->belongsTo('App\Student');
    }
}
