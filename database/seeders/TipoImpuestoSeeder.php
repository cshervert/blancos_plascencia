<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoImpuesto;

class TipoImpuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['nombre' => "Tasa"],
            ['nombre' => "Cuota"],
            ['nombre' => "Exentó"]
        ];
        foreach ($types as $item) {
            TipoImpuesto::create($item);
        }
    }
}
