<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RolSeeder::class);

        Usuario::factory()->create([
            'nombre'    => 'Juan Carlos Salvador Hervert',
            'direccion' => 'Loma Baja #25',
            'ciudad'    => 'Zapopan',
            'telefono'  => '3320168482',
            'celular'   => '3310960761',
            'foto'      => '',
            'email'     => 'hervert0719@gmail.com',
            'username'  => 'hervert',
            'password'  => '123123',
            'id_rol'    => 1
        ]);

        Usuario::factory()->create([
            'nombre'    => 'Mitsy Contreras',
            'direccion' => 'demo',
            'ciudad'    => 'demo',
            'telefono'  => '0000000',
            'celular'   => '0000000',
            'foto'      => '',
            'email'     => 'mitsy@gmail.com',
            'username'  => 'mitsy',
            'password'  => '123123',
            'id_rol'    => 2
        ]);
    }
}
