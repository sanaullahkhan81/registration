<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    protected $fillable = [
        'student_id',
        'course_id'
    ];
    public function student()
    {
        return $this->belongsToMany('App\Student');
    }
}
