<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolSeeder::class);

        User::factory()->create([
            'name'      => 'Juan Carlos Salvador Hervert',
            'username'  => 'Hervert',
            'email'     => 'hervert0719@gmail.com',
            'password'  => '123123',
            'address'   => 'Loma Baja #25',
            'city'      => 'Zapopan',
            'phone'     => '3310960761',
            'cell_phone' => '3310960761',
            'photo'     => '',
            'id_rol'    => 1,
        ]);
    }
}
