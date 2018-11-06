<?php

namespace App\Domains\Product;

/**
 * Class Product
 * @package App\Domains\Product
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property integer $price
 * @property string $category_id
 */
class Product
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'category_id',
    ];
}
