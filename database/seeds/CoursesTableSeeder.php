<?php

use App\Course;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Course::truncate();

        $courses = [
            'Hifz-ul-Quran (memorisation)',
            'Quran and Islamic Studies (Maktab)'
        ];

        foreach ($courses as $course) {
            Course::create([
                'course_name' => $course,
            ]);
        }
    }
}
