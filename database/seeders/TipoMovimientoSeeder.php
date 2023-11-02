<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoMovimiento;

class TipoMovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['tipo' => 'Entrada'],
            ['tipo' => 'Salida'],
            ['tipo' => 'Traspaso'],
        ];
        foreach ($types as $item) {
            TipoMovimiento::create($item);
        }
    }
}
