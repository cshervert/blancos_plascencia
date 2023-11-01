<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Impuesto;

class ImpuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Impuesto::create([
            'nombre'    => 'I.V.A',
            'impuesto'  => 16,
            'activo'    => 1,
            'impreso'   => 1,
            'impuesto_local'   => 0,
            'id_desglose_impuesto' => 1,
            'id_tipo_impuesto' => 1,
            'orden'            => 0,
            'aplicar_iva'      => 0,
            'cuenta_clave'     => 'NA'
        ]);
    }
}
