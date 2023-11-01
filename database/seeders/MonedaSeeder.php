<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Moneda;

class MonedaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monedas = [
            [
                'nombre' => 'Pesos',
                'codigo' => 'MXN',
                'tasa_cambio' => 1,
                'pais' => 'México'
            ],
            [
                'nombre' => 'Dolares',
                'codigo' => 'USD',
                'tasa_cambio' => 18.06,
                'pais' => 'Estados Unidos'
            ],
        ];
        foreach ($monedas as $item) {
            Moneda::create($item);
        }
    }
}
