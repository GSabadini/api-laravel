<?php

namespace App\Domains\Product;

use Carbon\Carbon;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class ProductService
 * @package App\Domains\Product
 */
class ProductService
{
    /**
     * @param Product $product
     * @param $data
     * @return Product
     */
    public function fill(Product $product, $data)
    {
        $fileName = $this->makePathImage($data['image']);

        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->image = $fileName;
        $product->price = $data['price'];
        $product->category_id = $data['category_id'];

        $product->save();

        return $product;
    }

    /**
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        if ($search) {
            $valueSearch = '%' . $search . '%';

            return Product
                ::orWhere('name', 'like', $valueSearch)
                ->with('category')
                ->paginate(10);
        }

        return Product
            ::with('category')
            ->paginate(10);
    }

    /**
     * @param ProductRequest $request
     * @return Product
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();

        return $this->fill($product, $request->all());
    }

    /**
     * @param Product $product
     * @param ProductRequest $request
     * @return Product
     */
    public function update(Product $product, ProductRequest $request)
    {
        return $this->fill($product, $request);
    }

    /**
     * @param $image
     * @return string
     */
    public function makePathImage($image)
    {
        $uriImage = explode('/', $image);

        if ($uriImage[2] === 'localhost:8081') {
            return $uriImage[4];
        }

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
