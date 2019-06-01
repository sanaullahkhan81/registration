<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Guardian;
use Faker\Generator as Faker;

$factory->define(Guardian::class, function (Faker $faker) {
    return [
        'name' => $faker->name .' '.$faker->lastName,
        'occupation' => $faker->jobTitle,
        'address' => $faker->address,
        'post_code' => $faker->postcode,
        'telephone' => $faker->phoneNumber,
        'mobile' => $faker->phoneNumber,
    ];
});
