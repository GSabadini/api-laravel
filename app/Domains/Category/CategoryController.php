<?php

namespace App\Domains\Category;


use App\Http\Controllers\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

/**
 * Class CategoryController
 * @package App\Domains\Category
 */
class CategoryController extends Controller
{
    /**
     * @return ResponseFactory|Response
     */

    public function index()
    {
        $categories = Category::all();

        return response($categories);
    }
}
