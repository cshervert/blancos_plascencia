<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sucursal;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branch_offices = [
            [
                'nombre'    => 'Blancos Plascencia Tesistan 1',
                'domicilio' => 'Hidalgo',
                'numero_interior' => '',
                'numero_exterior' => '219',
                'colonia'   => 'San Francisco Tesistán',
                'cp'        => '45200',
                'ciudad'    => 'Zapopán',
                'estado'    => 'Jalisco',
                'email'     => 'vianneytesis1@gmail.com',
                'telefono'  => '523325982830',
                'celular'   => '523325982830',
                'activo'    => 1,
                'eliminado' => 0
            ],
            [
                'nombre'    => 'Blancos Plascencia Tesistan 2',
                'domicilio' => 'Calle Aldama',
                'numero_interior' => '',
                'numero_exterior' => '4',
                'colonia'   => 'San Francisco Tesistán',
                'cp'        => '45200',
                'ciudad'    => 'Zapopán',
                'estado'    => 'Jalisco',
                'email'     => 'vianneytesis2@gmail.com',
                'telefono'  => '523321907340',
                'celular'   => '523321907340',
                'activo'    => 1,
                'eliminado' => 0
            ], [
                'nombre'    => 'Blancos Plascencia Tesistan 3',
                'domicilio' => 'Calle Valle de Tesistan 60',
                'numero_interior' => '',
                'numero_exterior' => '60',
                'colonia'   => 'San Francisco Tesistán',
                'cp'        => '45200',
                'ciudad'    => 'Zapopán',
                'estado'    => 'Jalisco',
                'email'     => 'vianneytesis3@gmail.com',
                'telefono'  => '523318671617',
                'celular'   => '523318671617',
                'activo'    => 1,
                'eliminado' => 0
            ], [
                'nombre'    => 'Vianney Blancos Plascencia 4',
                'domicilio' => 'Av. Juan Gil Preciado',
                'numero_interior' => '',
                'numero_exterior' => '7050',
                'colonia'   => 'Jardines de la fuente',
                'cp'        => '45200',
                'ciudad'    => 'Zapopán',
                'estado'    => 'Jalisco',
                'email'     => 'vianneytesis4@gmail.com',
                'telefono'  => '523321767732',
                'celular'   => '523321767732',
                'activo'    => 1,
                'eliminado' => 0
            ],
            [
                'nombre'    => 'BP Nuevo Mexico',
                'domicilio' => 'Test',
                'numero_interior' => '',
                'numero_exterior' => '7050',
                'colonia'   => 'Jardines de la fuente',
                'cp'        => '45200',
                'ciudad'    => 'Zapopán',
                'estado'    => 'Jalisco',
                'email'     => 'vianneytesis5@gmail.com',
                'telefono'  => '523321767732',
                'celular'   => '523321767732',
                'activo'    => 1,
                'eliminado' => 0
            ]
        ];
        foreach ($branch_offices as $item) {
            Sucursal::create($item);
        }
    }
}
