<?php

use App\Domains\User\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'password' => bcrypt('secret'),
        'email' => $faker->unique()->safeEmail,
    ];
});
