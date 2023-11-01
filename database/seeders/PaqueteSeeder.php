<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paquete;

class PaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $package = [
            [
                'clave'            => '35268956785',
                'clave_alterna'    => 'CCL355',
                'es_servicio'      => 0,
                'descripcion'      => 'Paquete de Almohadas',
                'id_categoria'     => 1,
                'id_unidad_venta'  => 2,
                'id_impuesto'      => 1,
                'precio_compra_promedio_neto' => 598.236,
                'precio_compra_promedio'      => 589.356,
                'id_precio'        => 1,
                'id_moneda'        => 1,
                'tasa_cambio'      => 1,
                'clave_sat'        => 'NA',
                'localizacion'     => 'Pasillo 1',
                'imagenes'         => '[]',
                'caracteristicas'  => '',
                'etiquetas'        => '[]',
                'activo'           => 1,
            ]
        ];
        foreach ($package as $item) {
            Paquete::create($item);
        }
    }
}
