<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\HealthData;
use Faker\Generator as Faker;

$factory->define(HealthData::class, function (Faker $faker) {
    return [
//        $table->bigIncrements('id');
//    $table->integer('student_id')->unsigned();
    'serious_illness' => $faker->boolean($chanceOfGettingTrue = 30),
    'serious_illness_description' => $faker->text(100),
   'serious_illness_relevant_info' => $faker->text(120),
    'surgery_name' => $faker->company,
    'doctor_name' => 'Dr. ' .$faker->firstName . $faker->lastName,
    'surgery_address' => $faker->address
    ];
});
