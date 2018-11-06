<?php

use App\Domains\Category\Category;
use Illuminate\Database\Seeder;

/**
 * Class CategorySeeder
 */
class CategorySeeder extends Seeder
{
    public function run()
    {
        factory(Category::class, 5)->create();
    }
}
