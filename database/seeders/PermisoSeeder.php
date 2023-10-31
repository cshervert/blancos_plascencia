<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permiso;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['permiso' => 'Usuarios'],
            ['permiso' => 'Roles'],
            ['permiso' => 'Empresa'],
            ['permiso' => 'Cuentas Bancarias']
        ];
        foreach ($permissions as $item) {
            Permiso::create($item);
        }
    }
}
