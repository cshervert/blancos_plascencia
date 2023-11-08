<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CuentaBancaria;

class CuentaBancariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CuentaBancaria::create([
            'cuenta'    => 'Bancomer',
            'sucursal'  => 'Tesistán',
            'clave'     => '01254878787874544',
            'banco'     => 'BBVA BANCOMER',
            'cuenta_contable' => 'NA',
            'mostrar'   => true,            
            'id_empresa' => 1
        ]);
    }
}
