<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empleados = [
            [
                'alias'     => 'Juan Carlos',
                'nombre'    => 'Juan Carlos Salvador Hervert',
                'direccion' => 'Calle Demo #25',
                'nss'       => 'NS000000000000000',
                'curp'      => 'SH78987887887JHNL',
                'ciudad'    => 'Zapopan',
                'telefono'  => '000000000',
                'celular'   => '000000000',
                'email'     => 'hervert0719@gmail.com',
                'comision'  => 10,
                'fecha_nacimiento' => '1995-10-01',
                'id_puesto' => 1,
                'id_sucursal' => 1,
                'activo'    => true,
                'eliminado' => false
            ], [
                'alias'     => 'Mitsy',
                'nombre'    => 'Mitsy Contreras',
                'direccion' => 'Calle Demo #1',
                'nss'       => '1234568987890',
                'curp'      => 'TEST1245447878',
                'ciudad'    => 'Zapopan',
                'telefono'  => '000000000',
                'celular'   => '000000000',
                'email'     => 'mitsy@gmail.com',
                'comision'  => 15,
                'fecha_nacimiento' => '1995-10-19',
                'id_puesto' => 2,
                'id_sucursal' => 1,
                'activo'    => true,
                'eliminado' => false
            ], [
                'alias'     => 'Karla',
                'nombre'    => 'Karla Liset Plascencia Ramírez',
                'direccion' => null,
                'nss'       => null,
                'curp'      => null,
                'ciudad'    => 'Zapopan',
                'telefono'  => null,
                'celular'   => '000000000',
                'email'     => 'Karlishet@gmail.com',
                'comision'  => 10,
                'fecha_nacimiento' => null,
                'id_puesto'     => 4,
                'id_sucursal'   => 5,
                'activo'        => true,
                'eliminado'     => false
            ], [
                'alias'     => 'Vanessa',
                'nombre'    => 'Vanessa Plascencia Ramírez',
                'direccion' => null,
                'nss'       => null,
                'curp'      => null,
                'ciudad'    => 'Zapopan',
                'telefono'  => null,
                'celular'   => '000000000',
                'email'     => 'Plascenciavanessa388@gmail.com',
                'comision'  => 10,
                'fecha_nacimiento' => null,
                'id_puesto'     => 4,
                'id_sucursal'   => 2,
                'activo'        => true,
                'eliminado'     => false
            ], [
                'alias'     => 'Alma',
                'nombre'    => 'Alma Rubi González Castro',
                'direccion' => null,
                'nss'       => null,
                'curp'      => null,
                'ciudad'    => 'Zapopan',
                'telefono'  => null,
                'celular'   => '000000000',
                'email'     => 'rubi.glez47@gmail.com',
                'comision'  => 10,
                'fecha_nacimiento' => null,
                'id_puesto'     => 4,
                'id_sucursal'   => 1,
                'activo'        => true,
                'eliminado'     => false
            ], [
                'alias'     => 'Fatima',
                'nombre'    => 'Fatima Magallanes Castro',
                'direccion' => null,
                'nss'       => null,
                'curp'      => null,
                'ciudad'    => 'Zapopan',
                'telefono'  => null,
                'celular'   => '000000000',
                'email'     => 'fmagallanes730@gmail.com',
                'comision'  => 10,
                'fecha_nacimiento' => null,
                'id_puesto'     => 4,
                'id_sucursal'   => 1,
                'activo'        => true,
                'eliminado'     => false
            ]
        ];

        foreach ($empleados as $item) {
            Empleado::create($item);
        }
    }
}
