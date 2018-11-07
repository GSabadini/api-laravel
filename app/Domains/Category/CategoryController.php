<?php

namespace App\Domains\Category;


use App\Http\Controllers\Controller;

/**
 * Class CategoryController
 * @package App\Domains\Category
 */
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return response($categories);
    }
}
