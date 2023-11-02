<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inventario;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inventario::create([
            'id_articulo'  => 1,
            'existencia_inicial' => 0,
            'entradas' => 0,
            'salidas'  => 0,
            'existencia'  => 0
        ]);
    }
}
