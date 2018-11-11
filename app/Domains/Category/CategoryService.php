<?php

namespace App\Domains\Category;


/**
 * Class CategoryService
 * @package App\Domains\Category
 */
class CategoryService
{
    /**
     * @param $name
     * @return Category
     */
    public function store($name)
    {
        $category = new Category();
        $category->name = $name;

        $category->save();

        return $category;
    }
}
