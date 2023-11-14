<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PermisoUsuario;

class PermisoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission_user = [
            [
                'id_permiso' => 1,
                'id_usuario' => 1,
                'crear'      => 1,
                'leer'       => 1,
                'editar'     => 1,
                'eliminar'   => 1
            ]
        ];
        foreach ($permission_user as $item) {
            PermisoUsuario::create($item);
        }
    }
}
