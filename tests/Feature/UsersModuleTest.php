<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UsersModuleTest extends TestCase
{
   
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function it_visit_page_of_login()
    {
        $this->get('/users')
            ->assertStatus(200)
            ->assertSee('users');   
       
    }
    /** @test */
    public function authenticated_to_a_user()
    {
        $user = create('App\User', [
            "email" => "user@gmail.com"
        ]);

        $this->get('/')->assertSee('Home');
        $credentials = [
            "email" => "user@gmail.com",
            "password" => "secret"
        ];
    

        $response = $this->post('/', $credentials);
        $response->assertRedirect('/home');
        $this->assertCredentials($credentials);
    }

    /** @test */
    public function not_authenticate_to_a_user_with_credentials_invalid()
    {
        $user = create('App\User', [
            "email" => "user@gmail.com"
        ]);
        $credentials = [
            "email" => "user@gmail.com",
            "password" => "secret"
        ];

        $this->assertInvalidCredentials($credentials);
    }

    /** @test */
    public function the_email_is_required_for_authenticate()
    {
        $user = create('App\User');
        $credentials = [
            "email" => null,
            "password" => "secret"
        ];

        $response = $this->from('/')->post('/', $credentials);
        $response->assertRedirect('/')->assertSessionHasErrors([
            'email' => 'The email field is required.',
        ]);
    }

    /** @test */
    public function the_password_is_required_for_authenticate()
    {
        $user = create('App\User', ['email' => 'galemo3961@gmail.com']);
        $credentials = [
            "email" => "user@gmail.com",
            "password" => null
        ];

        $response = $this->from('/')->post('/', $credentials);
        $response->assertRedirect('/')
            ->assertSessionHasErrors([
                'password' => 'The password field is required.',
            ]);
    }


}


