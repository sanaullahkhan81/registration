<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Admission;
use Faker\Generator as Faker;

$factory->define(Admission::class, function (Faker $faker) {
    return [
        'other_children_at_institute' => $faker->boolean($chanceOfGettingTrue = 50),
        'accept_terms_conditions' => 1,
        'date_received' => $faker->dateTime,
        'enrolment_date' => $faker->dateTime,
        'application_number' => $faker->randomNumber()
    ];
});
