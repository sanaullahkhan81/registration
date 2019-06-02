<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormerCourse extends Model
{
    protected $casts = [
        'books' => 'json'
    ];

    protected $fillable= [
        'student_id',
        'madrasa_name',
        'teacher_name',
        'teacher_number',
        'books',
        'leaving_reason',
        'former_education_details'
    ];
}
