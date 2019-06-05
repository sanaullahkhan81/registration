<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    public $fillable=[
        'student_id',
        'other_children_at_institute',
        'accept_terms_conditions',
        'date_received',
        'birth_certificate',
        'passport',
        'enrolment_date',
        'application_number'
    ];

    public function student(){

        return $this->belongsTo('App\Student');
    }
}
