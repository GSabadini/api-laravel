<?php

namespace App\Domains\Category;

use App\Domains\Uuid as UuidTrait;
use App\Domains\Product\Product;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Domains\Category
 * @property string $id
 * @property string $name
 */
class Category extends Model
{
    use UuidTrait;
    public $incrementing = false;

    protected $table = 'categories';

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
