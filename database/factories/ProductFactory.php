<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'name'=> $faker->word,
        'brand'=> $faker->word,
        'description' => $faker->text,
        'image_link' => $faker->randomElement([
            'http://localhost:8000/storage/git.png',
            'http://localhost:8000/storage/php.jpeg',
            'http://localhost:8000/storage/laravel.png',
        ]),
        'original_price' => $faker->numberBetween($min = 100, $max = 500),
        'current_price' => $faker->numberBetween($min = 100, $max = 500),
        'created_at' => new DateTime,
        'updated_at' => new DateTime
    ];
});
