<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Entrada;

class EntradaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entries = [
            [
                'id_compra'     => 1,
                'id_articulo'   => 1,
                'cantidad'      => 10,
                'precio_compra' => 1000.00,
                'precio_descuento'  => 90,
                'factor'        => 1,
                'es_precio_neto'    => 1,
                'porcentaje_descuento' => 0,
                'id_impuesto' => 1,
                'id_proveedor' => 1
            ]
        ];
        foreach ($entries as $item) {
            Entrada::create($item);
        }
    }
}
