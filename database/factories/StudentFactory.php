<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Ethnic;
use App\Student;
use App\Country;
use App\Course;
use App\Language;
use App\Nationality;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {

    return [
        'forename' => $faker->name,
        'surname' => $faker->lastName,
        'date_of_birth' =>$faker->dateTime,
        'gender' => $faker->randomElement($array = array ('male', 'female')),
        'address' => $faker->address,
        'post_code' => $faker->postcode,
        'telephone' => $faker->phoneNumber,
        'mobile' => $faker->phoneNumber,
        'relationship_to_child' => $faker->randomElement($array = array ('Father', 'Mother','Uncle')),
        'country_id' => Country::inRandomOrder()->first('id'),
        'ethnic_origin_id' => Ethnic::inRandomOrder()->first('id'),
        'language_id' => Language::inRandomOrder()->first('id'),
        'nationality_id' => Nationality::inRandomOrder()->first('id'),
//        'course_id' => Course::inRandomOrder()->first('id')
    ];
});
