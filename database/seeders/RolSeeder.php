<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rols = [
            ['name' => 'Administrador'],
            ['name' => 'Empleado']
        ];
        foreach ($rols as $rol) {
            Rol::create($rol);
        }
    }
}
