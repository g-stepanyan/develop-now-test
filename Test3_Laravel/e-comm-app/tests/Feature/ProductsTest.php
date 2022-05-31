<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    /**
     * Test get all products
     *
     * @return void
     */
    public function test_get_products()
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }

    public function test_create_product()
    {
        $category = Category::first();

        $product = Product::factory()->count(1)->make();
        $product = $product->toArray()[0];
        $product['category_id'] = $category->id;

        $response = $this->post('/api/products', $product);
        $result = json_decode($response->getContent(), true)['data'];

        $response->assertSee($result['id']);
    }
}
