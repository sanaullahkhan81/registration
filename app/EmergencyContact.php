<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    public function student()
    {
        // Two brothers and sisters may be at same school.
        return $this->belongsToMany('App\Student');
    }
}
