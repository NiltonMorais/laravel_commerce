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

$factory->define(CodeCommerce\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'cep' => $faker->randomNumber(8),
        'address' => $faker->address(),
        'district' => $faker->streetName(),
        'city' => $faker->city(),
        'state' => $faker->state(),
        'complement' => $faker->secondaryAddress(),
        'remember_token' => str_random(10),
    ];
});

$factory->define(CodeCommerce\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence
    ];
});

$factory->define(CodeCommerce\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->randomFloat(4,1,4),
        'featured' => $faker->numberBetween($min = 0, $max = 1),
        'recommend' => $faker->numberBetween($min = 0, $max = 1),
        'category_id' => $faker->numberBetween($min = 1, $max = 15),
    ];
});
