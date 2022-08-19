<?php

use Illuminate\Database\Seeder;
use App\Models\Business;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Business::create([

            'name' => 'Nombre de la empresa.',
            'description' => 'Descripción corta de la empresa',
            'logo' => 'logo.jpg',
            'mail' => 'Ejemplo@enterprises.com',
            'address' => 'Cra 9-21 #33-31 Pereira, Colombia',
            'nit' => '0008899078',

        ]);

    }
}
