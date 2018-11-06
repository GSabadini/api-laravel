<?php

namespace App\Domains\Product;

use App\Domains\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function index()
    {
        $products = User::paginate(15);

        return response($products);
    }

    public function show(Product $product)
    {
        return response($product);
    }

    public function store(ProductRequest $request)
    {

    }

    public function update(Product $product, ProductRequest $request)
    {

    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response($product, 204);
    }
}
