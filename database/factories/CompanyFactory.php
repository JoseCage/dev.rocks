<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use DevRocks\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {

    $name = $faker->company;

    return [
      'name' => $name,
      'email' => $faker->unique()->companyEmail,
      'email_verified_at' => now(),
      'phone' => $faker->tollFreePhoneNumber(15),
      'logo' => $faker->imageUrl($width = 640, $height = 480),
      'facebook_page' => 'https://facebook.com/'.str_slug($name).'.',
      'website' => 'https://'.str_slug($name).'.com/',
      'twitter_handle' => 'https://twitter.com/'.str_slug($name).'.',
      'github_profile' => 'https://github.com/'.str_slug($name).'.',
      'slug' => str_slug($name),
      'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
      'remember_token' => Str::random(10),
    ];
});
