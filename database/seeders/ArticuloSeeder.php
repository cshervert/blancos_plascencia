<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Articulo;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = [
            [
                'clave'            => '000876150007',
                'clave_alterna'    => '000876150007',
                'es_servicio'      => 0,
                'descripcion'      => 'ALMOHADA ABRAZABLE DINOSAURIOS',
                'id_categoria'     => 1,
                'id_unidad_compra' => 2,
                'id_unidad_venta'  => 2,
                'factor'           => 1,
                'id_impuesto'      => null,
                'precio_compra'    => 419.00,
                'es_precio_neto'   => 0,
                'id_precio'        => 2,
                'id_moneda'        => 1,
                'tasa_cambio'      => 1,
                'clave_sat'        => 'NA',
                'inventario_min'   => 1,
                'inventario_max'   => 10,
                'localizacion'     => 'Pasillo 2',
                'imagenes'         => '[]',
                'caracteristicas'  => '',
                'etiquetas'        => '[]',
                'activo'           => 1,
            ]
        ];
        foreach ($articles as $item) {
            Articulo::create($item);
        }
    }
}
