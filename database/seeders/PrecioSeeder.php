<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Precio;

class PrecioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prices = [
            [
                'utilidad_1'            => 95.677233,
                'precio_venta_1'        => 679.00,
                'precio_venta_neto_1'   => 679.00,
                'unidad_mayoreo_1'      => 0,
                'utilidad_2'            => 29.394813,
                'precio_venta_2'        => 499,
                'precio_venta_neto_2'   => 499,
                'unidad_mayoreo_2'      => 1,
                'utilidad_3'            => 43.804035,
                'precio_venta_3'        => 499,
                'precio_venta_neto_3'   => 499,
                'unidad_mayoreo_3'      => 2,
                'utilidad_4'            => 23.631124,
                'precio_venta_4'        => 429.00,
                'precio_venta_neto_4'   => 429.00,
                'unidad_mayoreo_4'      => 3,
                'es_articulo'           => 0
            ],
            [
                'utilidad_1'            => 95.677233,
                'precio_venta_1'        => 679.00,
                'precio_venta_neto_1'   => 679.00,
                'unidad_mayoreo_1'      => 0,
                'utilidad_2'            => 29.394813,
                'precio_venta_2'        => 499,
                'precio_venta_neto_2'   => 499,
                'unidad_mayoreo_2'      => 1,
                'utilidad_3'            => 43.804035,
                'precio_venta_3'        => 499,
                'precio_venta_neto_3'   => 499,
                'unidad_mayoreo_3'      => 2,
                'utilidad_4'            => 23.631124,
                'precio_venta_4'        => 429.00,
                'precio_venta_neto_4'   => 429.00,
                'unidad_mayoreo_4'      => 3,
                'es_articulo'           => 1
            ]
        ];
        foreach ($prices as $item) {
            Precio::create($item);
        }
    }
}
