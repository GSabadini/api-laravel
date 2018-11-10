<?php

namespace Tests\Feature;

use App\Domains\Category\Category;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    private $endpoint = 'api/backoffice/categories';

    public function testShouldGetCategoryList()
    {
        /** @var Category $categories */
        $categories = factory(Category::class, 10)
            ->create()
            ->toArray();

        $response = $this->json('GET', $this->endpoint);

        $response
            ->assertStatus(200)
            ->assertJson($categories);

        $responseData = $response->decodeResponseJson();

        $this->assertCount(10, $responseData);
    }
}
