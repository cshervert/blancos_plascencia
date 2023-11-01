<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DesgloseImpuesto;

class DesgloseImpuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $breakdown = [
            ['nombre' => "Trasladado"],
            ['nombre' => "Retenido"]
        ];
        foreach ($breakdown as $item) {
            DesgloseImpuesto::create($item);
        }
    }
}
