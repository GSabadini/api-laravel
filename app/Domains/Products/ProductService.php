<?php

namespace App\Domains\Product;

use Carbon\Carbon;

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
        $fileName = $this->makePathImage($request->image);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $fileName;
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
        $fileName = $this->makePathImage($request->image);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $fileName;
        $product->price = $request->price;
        $product->category_id = $request->category_id;

        $product->save();

        return $product;
    }

    /**
     * @param $image
     * @return string
     */
    public function makePathImage($image)
    {
        $exploded = explode(',', $image);

        if (count($exploded) === 1) {
            return true;
        }

        $decoded = base64_decode($exploded[1]);

        if (str_contains($exploded[0], 'jpeg')) {
            $extension = 'jpg';
        } else {
            $extension = 'png';
        }

        $date = Carbon::now()->toDateString();
        $fileName = sprintf('%s%s.%s', str_random(), $date, $extension);
        $path = sprintf('%s/%s/%s', public_path(), 'products', $fileName);

        file_put_contents($path, $decoded);

        return $fileName;
    }

}
