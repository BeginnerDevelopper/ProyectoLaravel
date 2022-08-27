<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Client;

class ClientTest extends TestCase
{
    /**
     * A basic feature test example
     * CRUD DE LA RUTA CLIENTE Feature realiza
     * test del sistema con objetos, clases etc.
     *
     * @return void
     */
    public function test_get_client()
    {
        
        $response = new Client();
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function client_can_be_created()
    {

        $this->withoutExceptionHandling();

        //Datos de prueba
       $client =  Client::factory(6)->create();
        $response = $this->post('/client', [
            'name' =>'Client Test',
            'dni' =>'1234567777',
            'nit' =>'1200000000',
            'address' => 'Client address Bis',
            'phone' => '1233567899',
            'email' => 'fulltesting@gmail.com',
        ]);

        $response->assertOk();
        

        $this->assertCount(1, Client::all());

        $client = Client::first();

        //Comparacion de valores
        $response->assertViewIs('clients.index');
        $response->assertViewHas('clients', $client);
        // $this->assertEquals($client->name, 'Project Test');
        // $this->assertEquals($client->dni, 'Project dni');
  
    }

    /** @test */
    public function client_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $client = factory(Client::class, 6)->create();
     
        //Metodo HTTP
        $response = $this->put("/clients/{client[0]->id}", [
            'name' =>'Client Test',
            'dni' =>'1234567777',
            'nit' =>'1200000000',
            'address' => 'Client address Bis',
            'phone' => '1233567899',
            'email' => 'fulltesting@gmail.com',
        ]);

        $client = Client::findOrFail($client[0]->id);

        //comparar valores
        $this->assertEquals($client->name, 'Client Test');
        $this->assertEquals($client->dni, 'Client dni');
        $this->assertEquals($client->nit, 'Client nit');
        $this->assertEquals($client->address,'Client address');
        $this->assertEquals($client->phone, 'Client phone');
        $this->assertEquals($client->email, 'Client email');

        //Redirect
       $response->assertRedirect("/clients/{client->id");

    }

    /** @test */
    public function client_can_be_retrieved()
    {
        $this->withoutExceptionHandling();

        //Datos de prueba
        $client = factory(Client::class)->count(6)->create();

        $response = $this->get("/clients/{client[0]->id}");

        $response->assertOk();

        $client = Client::first();

        $response->assertViewIs('clients.show');
        $response->assertViewHas('clients', $client);

    }

    /** @test */
    public function client_can_be_deleted()
    {
        $this->withoutExceptionHandling();
        
        $client = Client::factory(6)->create();

        $response = $this->delete("/clients/{$client[0]->id}");

        $this->assertCount(0, Client::all());

        //Redirect
        $response->assertRedirect('/clients');

    }




}
