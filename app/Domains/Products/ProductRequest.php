<?php

namespace App\Domains\Product;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ProductRequest
 * @package App\Domains\Product
 */
class ProductRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
