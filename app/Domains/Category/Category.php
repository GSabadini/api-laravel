<?php

namespace App\Domains\Category;

use App\Domains\Product\Product;
use App\Domains\Uuid as UuidTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Domains\Category
 * @property $string $name
 */
class Category extends Model
{
//    use UuidTrait;

    protected $table = 'categories';

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
