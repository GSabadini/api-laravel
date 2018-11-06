<?php

use App\Domains\Category\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'id' => $faker->uuid,
        'name' => $faker->name,
    ];
});
