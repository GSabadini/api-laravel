<?php

namespace Tests\Feature;

use App\Domains\Category\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use DatabaseMigrations;

    private $endpoint = 'api/categories';

    public function testShouldGetCategoryList()
    {
        /** @var Category $categories */
        $categories = factory(Category::class, 10)
            ->create()
            ->toArray();

        $response = $this->get($this->endpoint);

        $response
            ->assertStatus(200)
            ->assertJson($categories);

        $responseData = $response->decodeResponseJson();

        $this->assertCount(10, $responseData);
    }
}
