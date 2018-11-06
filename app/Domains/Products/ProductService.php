<?php

namespace App\Domains\Product;

/**
 * Class ProductService
 * @package App\Domains\Product
 */
class ProductService
{
    /**
     * @param ProductRequest $request
     * @return Product
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        $product->save();

        return $product;
    }

    /**
     * @param Product $product
     * @param ProductRequest $request
     * @return Product
     */
    public function update(Product $product, ProductRequest $request)
    {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        $product->save();

        return $product;
    }
}
