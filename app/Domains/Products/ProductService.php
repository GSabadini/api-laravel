<?php

namespace App\Domains\Product;

use App\Domains\Category\Category;
use App\Domains\Category\CategoryService;
use App\Domains\Products\ProductFilter;
use Carbon\Carbon;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use League\Csv\Reader;

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
            $product = Product
                ::where('name', 'like', $valueSearch)
                ->with('category')
                ->paginate(10);

            return $product;
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

    public function readCsv()
    {
        $file = Reader::createFromPath('../public/csv/example.csv', 'r');
        $sizeFile = count($file);

        for ($x = 1; $x < $sizeFile; $x++) {
            $header[$x] = $file->fetchOne($x);
            $name = $header[$x][0];
            $description = $header[$x][1];
            $categoryName = $header[$x][2];
            $price = $header[$x][3];

            $product = new Product();
            $product->name = $name;
            $product->description = $description;
            $product->price = $price;
            $getCategory = Category::where('name', $categoryName)->first();

            if (!$getCategory) {
                $categoryService = new CategoryService();
                $category = $categoryService->store($categoryName);
                $product->category_id = $category->id;
            } else {
                $product->category_id = $getCategory->id;
            }


            $product->save();
        }

        return $product;
    }

}
