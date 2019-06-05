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
        return $this->belongsToMany(Guardian::class, 'student_guardians');
    }

    public function emergency_contacts()
    {
        return $this->hasMany('App\EmergencyContact');
    }

    public function health_data()
    {
        return $this->hasOne('App\HealthData');
    }

    public function admission(){
        return $this->hasOne('App\Admission')->whereNotNull('enrolment_date');
    }

    public function language()
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function nationality()
    {
        return $this->hasOne(Nationality::class, 'id', 'nationality_id');
    }

    public function ethnic()
    {
        return $this->hasOne(Ethnic::class,'id','ethnic_origin_id');
    }
}
