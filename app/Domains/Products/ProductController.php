<?php

namespace App\Domains\Product;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

/**
 * Class ProductController
 * @package App\Domains\Product
 */
class ProductController extends Controller
{
    protected $service;

    /**
     * ProductController constructor.
     */
    public function __construct()
    {
        $this->service = new ProductService();
    }

    /**
     * @return ResponseFactory|Response
     */
    public function index()
    {
        $products = Product
            ::with('category')
            ->paginate(15);

        return response($products);
    }

    /**
     * @param Product $product
     * @return ResponseFactory|Response
     */
    public function show(Product $product)
    {
        return response($product);
    }

    /**
     * @param ProductRequest $request
     * @return ResponseFactory|Response
     */
    public function store(ProductRequest $request)
    {
        $response = $this
            ->service
            ->store($request);

        return response($response, 201);
    }

    /**
     * @param Product $product
     * @param ProductRequest $request
     * @return ResponseFactory|Response
     */
    public function update(Product $product, ProductRequest $request)
    {
        $response = $this
            ->service
            ->update($product, $request);

        return response($response);
    }

    /**
     * @param Product $product
     * @return ResponseFactory|Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response($product, 204);
    }
}
