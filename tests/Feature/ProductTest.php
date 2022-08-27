<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function product_can_tested()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function store_products()
    {
        $response = $this->post('/products', [
            // 'code',
            // 'name' ,       
            // 'stock',
            // 'image',
            // 'sell_price',
            // 'status',
            // 'category_id',
            // 'provider_id'

            "name" => "Xbox One",
            "stock" => 160,
            "image" => "none",
            "sell_price" => 1200,
            //"user" => auth()->user()
        ]);

        $response->assertJsonStructure(["name", "stock", "image", "sell_price"])
                 ->assertJson(["name" => "Xbox One"])
                 ->assertStatus([201]);

        $this->assertDatabaseHas('products', ["name" => "Xbox One", "stock" => 160, "image" => "none", "sell_price" => 1200]);
                 
    }
    /** @test */
    public function test_list_products()
    {
        
         factory(Product::class, 1)->create();
         $response = $this->get('/products');

         $response->assertJsonStructure([
            'data' => [
                '*' => ['code', 'name', 'stock', 'image', 'sell_price', 'status', 'created_at', 'updated_at']
                ]
                
            ])->assertStatus(200);

    }

}
