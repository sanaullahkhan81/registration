<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthData extends Model
{
    protected $fillable =[
        'student_id',
        'serious_illness',
        'serious_illness_description',
        'serious_illness_relevant_info',
        'surgery_name',
        'doctor_name',
        'surgery_address'
    ];
}
