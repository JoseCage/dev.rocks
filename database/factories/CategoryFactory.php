<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use DevRocks\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'category' => $faker->words(30),
        'description' => $faker->text(100),
    ];
});
