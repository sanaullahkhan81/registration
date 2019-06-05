<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\FormerCourse;
use Faker\Generator as Faker;

$factory->define(FormerCourse::class, function (Faker $faker) {

    $num = rand(1, 3);
    $books = [];
    for ($i = 1; $i <= $num; $i++) {
        $book = [
            'book_name' => $faker->sentence,
            'qaidah' => $faker->sentence,
            'quran' => $faker->sentence
        ];
        array_push($books,$book);
    }

    return [

        'madrasa_name' => $faker->company,
        'teacher_name' => $faker->firstName . ' '.$faker->lastName,
        'teacher_number' => $faker->phoneNumber,
        'books' => json_encode($books),
        'leaving_reason' => $faker->sentence,
        'former_education_details' => $faker->sentence
    ];
});
