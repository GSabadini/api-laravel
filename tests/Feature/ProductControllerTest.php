<?php

namespace Tests\Feature;

use App\Domains\Product\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use DatabaseMigrations;

    private $endpoint = 'api/products';

    /**
     * @param Product $product
     * @return array
     */
    public function returnStructureProducts($product)
    {
        return [
            'data' => [
                '0' => [
                    'name' => $product->name,
                    'description' => $product->description,
                    'image' => $product->image,
                    'price' => $product->price,
                    'category_id' => $product->category_id,
                ],
            ],
        ];
    }

    public function testShouldGetProductsList()
    {
        /** @var Product $products */
        $products = factory(Product::class, 10)->create();

        $structureProducts = $this->returnStructureProducts($products->first());

        $response = $this->get($this->endpoint);

        $response
            ->assertStatus(200)
            ->assertJson($structureProducts);

        $responseData = json_decode($response->getContent())->data;

        $this->assertCount(10, $responseData);
    }

    public function testShouldGetProductById()
    {
        /** @var Product $product */
        $product = factory(Product::class)->create();

        $structureProducts = $product->toArray();

        $uri = sprintf('%s/%s', $this->endpoint, $product->id);

        $response = $this->get($uri);

        $response
            ->assertStatus(200)
            ->assertJson($structureProducts);
    }

    public function testShouldCreateProduct()
    {
        /** @var Product $product */
        $product = factory(Product::class)
            ->make()
            ->toArray();

        $response = $this->post($this->endpoint, $product);

        $response
            ->assertStatus(201)
            ->assertJson($product);
    }

    public function testShouldEditProduct()
    {
        /** @var Product $product */
        $product = factory(Product::class)->create();

        /** @var Product $productEdit */
        $productEdit = factory(Product::class)
            ->make()
            ->toArray();

        $uri = sprintf('%s/%s', $this->endpoint, $product->id);

        $response = $this->put($uri, $productEdit);
        $response
            ->assertStatus(200)
            ->assertJson($productEdit);
    }

    public function testShouldDeleteProduct()
    {
        /** @var Product $product */
        $product = factory(Product::class)->create();

        $uri = sprintf('%s/%s', $this->endpoint, $product->id);

        $response = $this->delete($uri);

        $response->assertStatus(204);

        $productDelete = Product::find($product->id);

        $this->assertEquals(null, $productDelete);
    }
}
