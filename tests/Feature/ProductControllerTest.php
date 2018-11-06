<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    public function returnStructureProducts($product)
    {
        return [
            'name' => $product->name,
            'description' => $product->description,
            'image' => $product->image,
            'price' => $product->price,
            'category_id' => $product->category_id,
        ];
    }
}
