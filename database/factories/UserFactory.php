<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\City;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    if (count(City::all()) <= 0) {
        throw new Exception("Database should be migrated and seeded.");
    }

    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->firstName, // As far as I see Faker can't provide 'middle name'
        'last_name' => $faker->lastName,
        'city_id' => City::inRandomOrder()->first(),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
