<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Caja;

class CajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $boxs = [
            [
                'nombre'        => "Caja 1",
                'id_sucursal'   => 1,
                'activo'        => 1
            ],
            [
                'nombre'        => "Caja 2",
                'id_sucursal'   => 1,
                'activo'        => 1
            ],
            [
                'nombre'        => "Caja 3",
                'id_sucursal'   => 1,
                'activo'        => 1
            ]
        ];
        foreach ($boxs as $item) {
            Caja::create($item);
        }
    }
}
