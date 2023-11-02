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
        Empleado::create([
            'Alias'    => 'Hervert',
            'nombre'    => 'Juan Carlos Salvador Hervert',
            'direccion' => 'Loma Baja #25',
            'nss'  => '1234567890',
            'curp'  => 'sahj950719hjchd22',
            'ciudad'    => 'Zapopan',
            'telefono'  => '3320168482',
            'celular'   => '3310960761',
            'email'     => 'hervert0719@gmail.com',
            'comision'      => 10,
            'fecha_nac'      => '1995-07-19',
            'id_puesto'    => 1,
            'activo'    => true
        ]);
    }
}
