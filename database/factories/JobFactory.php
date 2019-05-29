<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use DevRocks\Models\Job;
use DevRocks\Models\Company;

use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {

    $title = $faker->word(40);

    return [
      'title' => $faker->word(40),
      'summary' => $faker->text,
      'context' => $faker->text,
      'is_open' => true,
      'is_featured' => false,
      'company_id' => function(){
          return factory(Company::class)->create()->id;
      },
      'image' => $faker->image,
      'due_date' => now()->addDays(30),
      'url' => $faker->url,
      'slug' => str_slug($title),
    ];
});
