<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proveedor;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proveedor::create([
            'representante'    => 'Juan Carlos Salvador Hervert',
            'nombre'    => 'Vianey',
            'alias'    => 'Vianey',
            'rfc'  => '1234567890',
            'curp'  => 'sahj950719hjchd22',
            'telefono'  => '3320168482',
            'celular'   => '3310960761',
            'email'     => 'hervert0719@gmail.com',
            'comentario'      => '-',
            'limite_credito' => 100000,
            'dias_credito'    => 30,
            'id_facturacion'    => 2,
            'activo'    => true,
            'eliminado' => false
        ]);
    }
}
