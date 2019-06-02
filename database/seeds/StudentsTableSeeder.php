<?php

use App\FormerCourse;
use App\Guardian;
use App\HealthData;
use App\StudentCourse;
use App\StudentGuardian;
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
        StudentGuardian::truncate();
        HealthData::truncate();
        FormerCourse::truncate();

        factory(App\Student::class, 200)->create()->each(function ($student){

            $course = App\Course::inRandomOrder()->first('id');
            $student->courses()->attach($course);

            // Add guardians to student
            $guardian = factory('App\Guardian')->create();
            $student->guardians()->attach($guardian);

            // Create an application and bind the user
            factory('App\Admission')->create(['student_id' => $student->id]);

            // Health data
           factory('App\HealthData')->create(['student_id' => $student->id]);

           // Former Course
            factory('App\FormerCourse')->create(['student_id' => $student->id]);

        });
    }
}
