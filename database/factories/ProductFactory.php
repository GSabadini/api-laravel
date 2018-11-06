<?php

use App\Domains\Category\Category;
use App\Domains\Product\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    static $category_id;

    return [
        'id' => $faker->uuid,
        'name' => $faker->name,
        'description' => $faker->text,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
        'category_id' => $category_id ?? Category::select('id')->inRandomOrder()->first()->id,
    ];
});
