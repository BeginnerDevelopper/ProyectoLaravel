<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //para TEST unicamente
        //factory(Client::class)->count(6)->create();
     
        factory(App\Models\Client::class, 6)->create()->each(function ($client) {
            $client->posts()->save(factory(App\Post::class)->make());
        });

    }

 


}
