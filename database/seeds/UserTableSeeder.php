<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([

            'name' => 'Admin',
            'slug' => 'admin',
            'special' => 'all-access',

        ]);

         $user = User::create([

            'name' => 'admin',
            'email' => 'galemo3961@gmail.com',
            'password' => '$2y$10$9vGb5k6t24K1R82ooIsCreTWPs/0/qcRib.g1IMb13wSMWulx.5Nu',

        ]);
        $user->roles()->sync(1);

    }
}
