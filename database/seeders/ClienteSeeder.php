<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create([
            'clave'    => 'JCSH001',
            'representante'    => 'Juan Carlos Salvador Hervert',
            'nombre'    => 'Juan Carlos Salvador Hervert',
            'rfc'  => '1234567890',
            'curp'  => 'sahj950719hjchd22',
            'telefono'  => '3320168482',
            'celular'   => '3310960761',
            'email'     => 'hervert0719@gmail.com',
            'numero_precio'      => 4,
            'limite_credito' => 100000,
            'dias_credito'    => 30,
            'id_facturacion'    => 1,
        ]);
    }
}
