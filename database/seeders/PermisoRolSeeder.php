<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PermisoRol;

class PermisoRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission_rols = [
            [
                'id_permiso' => 1,
                'id_rol'     => 1,
                'crear'      => 1,
                'leer'       => 1,
                'editar'     => 1,
                'eliminar'   => 1,
                'activo'     => 1,
            ]
        ];
        foreach ($permission_rols as $item) {
            PermisoRol::create($item);
        }
    }
}
