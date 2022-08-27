<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

        /** @test */
    public function test_set_name_in_lowercase()
    {

        $category = new Category;
        $category->name = 'Golosinas';

        $this->assertEquals('golosinas', $category->name);

        $response = $this->post('/category', [

            'name' => 'Test name',
            'description' => 'Test description',

        ]);

      
        
    }




}
