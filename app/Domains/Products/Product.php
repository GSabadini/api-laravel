<?php

namespace App\Domains\Product;

use App\Domains\Category\Category;
use App\Domains\Uuid as UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
class Product extends Model
{
    use UuidTrait;
    use SoftDeletes;
    public $incrementing = false;
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
