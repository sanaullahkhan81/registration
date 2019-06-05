<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    protected $fillable = [
        'student_id',
        'course_id'
    ];
    public $timestamps = false;
    public function student()
    {
        return $this->belongsToMany('App\Student');
    }
}
