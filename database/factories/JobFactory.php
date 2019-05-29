<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use DevRocks\Models\Job;
use DevRocks\Models\Company;

use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {

    $title = $faker->sentence($nbWords = 6, $variableNbWords = true);

    return [
      'title' => $title,
      'summary' => $faker->text(150),
      'context' => $faker->text(200),
      'is_open' => true,
      'is_featured' => false,
      'company_id' => function(){
          return factory(Company::class)->create()->id;
      },
      'image' => $faker->imageUrl($width = 800, $height = 800),
      'due_date' => now()->addDays(30),
      'url' => $faker->url,
      'slug' => str_slug($title),
    ];
});
