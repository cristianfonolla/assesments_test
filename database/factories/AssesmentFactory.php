<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Assesment::class, function (Faker\Generator $faker) {

    return [
        'grade_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'item_id' => $faker->randomDigitNotNull,
        'item_type' => $faker->word,
        'note' => $faker->text(15),
        'weight' => $faker->randomDigitNotNull,
        'parent_grade' => $faker->randomDigitNotNull,
    ];
});