<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DatosFacturacion;

class DatosFacturacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DatosFacturacion::create([
            'razon_social'    => 'Blancos Plascencia',
            'rfc'       => '1234567890',
            'curp'      => '1234567890',
            'domicilio' => 'Valle de Tesistán',
            'numero_exterior' => '1',
            'numero_interior' => '1',
            'colonia'   => 'San Francisco Tesistán',
            'cp'        => '45200',
            'ciudad'    => 'Zapopán',
            'localidad'    => 'Zapopán',
            'estado'    => 'Jalisco',
            'pais'  => 'México',
        ]);

        DatosFacturacion::create([
            'razon_social'    => 'Blancos Plascencia 2',
            'rfc'       => '1234567890',
            'curp'      => '1234567890',
            'domicilio' => 'Valle de Tesistán',
            'numero_exterior' => '1',
            'numero_interior' => '1',
            'colonia'   => 'San Francisco Tesistán',
            'cp'        => '45200',
            'ciudad'    => 'Zapopán',
            'localidad'    => 'Zapopán',
            'estado'    => 'Jalisco',
            'pais'  => 'México',
        ]);
    }
}
