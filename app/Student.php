<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function courses()
    {
        return $this->belongsToMany('App\Course', 'student_courses');
    }
    public function guardians()
    {
        return $this->belongsToMany('App\Guardian', 'student_guardians');
    }

    public function emergency_contacts()
    {
        return $this->hasMany('App\EmergencyContact');
    }

    public function health_data()
    {
        return $this->hasOne('App\HealthData');
    }
}
