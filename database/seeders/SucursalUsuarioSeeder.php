<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SucursalUsuario;

class SucursalUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branchs_users = [
            [
                'id_sucursal' => 1,
                'id_usuario'  => 1
            ],
            [
                'id_sucursal' => 2,
                'id_usuario'  => 1
            ],
            [
                'id_sucursal' => 3,
                'id_usuario'  => 1
            ],
            [
                'id_sucursal' => 4,
                'id_usuario'  => 1
            ]
        ];
        foreach ($branchs_users as $item) {
            SucursalUsuario::create($item);
        }
    }
}
