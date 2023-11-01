<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unidad;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unities = [
            ['unidad' => 'CAJA',  'clave_sat' => '', 'activo' => 1],
            ['unidad' => 'PZA', 'clave_sat' => '', 'activo' => 1],
            ['unidad' => 'm', 'clave_sat' => '', 'activo' => 1],
            ['unidad' => 'KG',  'clave_sat' => '', 'activo' => 0],
            ['unidad' => 'Lt',  'clave_sat' => '', 'activo' => 0]
        ];
        foreach ($unities as $item) {
            Unidad::create($item);
        }
    }
}
