<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use DevRocks\Models\JobType;
use Faker\Generator as Faker;

$factory->define(JobType::class, function (Faker $faker) {

    $type = $faker->text(10);
    return [
        'type' => ucfirst(str_slug($type)),//$faker->randomElement($array = array('Full Time', 'Freelance', 'Part Time', 'Internship', 'Temporary')),
        'slug' => str_slug($faker->text(10)),//str_slug($faker->randomElement($array = array('fulltime', 'freelance', 'parttime', 'internship', 'temporary'))),
        'description' => $faker->text,
    ];
});
