<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create([
            'nombre'    => 'Blancos Plascencia',
            'rfc'       => '',
            'curp'      => '',
            'domicilio' => 'Valle de Tesistán',
            'numero_interior' => '1',
            'numero_exterior' => '1',
            'colonia'   => 'San Francisco Tesistán',
            'cp'        => '45200',
            'ciudad'    => 'Zapopán',
            'estado'    => 'Jalisco',
            'email'     => 'vianneytesis3@gmail.com',
            'telefono'  => '3318671617',
            'celular'   => '3322654459',
            'id_cuenta_bancaria' => 1
        ]);
    }
}
