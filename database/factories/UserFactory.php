<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use DevRocks\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {

      $name = $faker->name;

      return [
        'name' => $name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'phone_number' => $faker->tollFreePhoneNumber(15),
        'photo' => $faker->imageUrl($width = 640, $height = 480),
        'facebook_handle' => 'https://facebook.com/'.str_slug($name).'',
        'website' => 'https://'.str_slug($name).'.com/',
        'twitter_handle' => 'https://twitter.com/'.str_slug($name).'',
        'github_handle' => 'https://github.com/'.str_slug($name).'',
        'username' => str_slug($name),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
