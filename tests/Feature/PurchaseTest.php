<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Purchase;

class PurchaseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function purchase_can_be_tested()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function purchase_can_created()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/purchases', [

         'tax' => 19,   
         'total' => 1000,   
         'status' => 'ACTIVE',
         'picture' => 'image.jpg',

        ]);

        $response->assertOk();
        $this->assertCount(1 ,Purchase::all());

        $purchase = Purchase::first();

        $this->assertEquals($purchase->tax, 19);
        $this->assertEquals($purchase->total, 1000);
        $this->assertEquals($purchase->status, 'ACTIVE');
        $this->assertEquals($purchase->picture, 'image.jpg');

    }

    /** @test */
    public function list_purchase_can_be_retrieved()
    {
     
        $this->withoutExceptionHandling();

        factory(Purchase::class, 1)->create();

        $response = $this->get('/purchases');

        $purchases = Purchase::all();

        $response->assertViewIs('purchases.index');
        $response->assertViewHas('purchases' , $purchases);

    }


    /** @test */
    public function a_purchase_can_be_retrieved()
    {
     
        $this->withoutExceptionHandling();

        $purchase = factory(App\Purchase::class, 1)->create();

        $response = $this->get('/purchases/'. $purchase->id);

        $response->assertOk();
        $purchases = Purchase::first();

        $response->assertViewIs('purchases.show');
        $response->assertViewHas('purchases' , $purchases);

    }

    /** @test */
    public function a_purchase_can_be_updated()
    {
     
        $this->withoutExceptionHandling();

        $purchase = factory(App\Purchase::class)->create();

        $response = $this->put('/purchases/'. $purchase->id, [
                
                'tax' => '',   
                'total' => '',   
                'status' => '',
                'picture' => '',


        ]);

        $response->Fresh();
        $purchases = Purchase::first();

        $this->assertEquals($purchase->tax, 19);
        $this->assertEquals($purchase->total, 1000);
        $this->assertEquals($purchase->status, 'ACTIVE');
        $this->assertEquals($purchase->picture, 'image.jpg');

        $response->assertRedirect('/purchases/'. $purchase->id);
    }

    /** @test */
    public function a_purchase_can_be_deleted()
    {
     
        $this->withoutExceptionHandling();

        $purchase = factory(App\Purchase::class)->create();

        $response = $this->delete('/purchases/'. $purchase->id);

        $this->assertCount(0 ,Purchase::all());

        $response->assertRedirect('/purchases');
    }


    /** @test */
    public function response_is_required()
    {
        $this->withoutExceptionHandling();

        $reponse = $this->post('/purchases', [

            'tax' => '',   
            'total' => 1000,   
            'status' => 'ACTIVE',
            'picture' => 'image.jpg',

        ]);

        $response->assertSessionHasErrors(['tax']);
        // $response->assertSessionHasErrors(['total']);
        // $response->assertSessionHasErrors(['status']);
        // $response->assertSessionHasErrors(['picture']);

    }

    public function purchase_content_is_required()
    {
        $this->withoutExceptionHandling();

        $reponse = $this->post('/purchases', [

            'tax' => '',   
            'total' => 1000,   
            'status' => 'ACTIVE',
            'picture' => 'image.jpg',

        ]);

        $response->assertSessionHasErrors(['tax']);
        // $response->assertSessionHasErrors(['total']);
        // $response->assertSessionHasErrors(['status']);
        // $response->assertSessionHasErrors(['picture']);

    }



}
