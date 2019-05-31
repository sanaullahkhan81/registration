<?php

use App\Guardian;
use App\StudentCourse;
use Illuminate\Database\Seeder;
use App\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::truncate();
        StudentCourse::truncate();
        Guardian::truncate();

        factory(App\Student::class, 1)->create()->each(function ($student){
            $course = App\Course::inRandomOrder()->first('id');
            $student->courses()->attach($course);
            // Add guardians to student
            $guardian = factory('App\Guardian')->create();
            $student->guardians()->attach($guardian);

        });
    }
}
