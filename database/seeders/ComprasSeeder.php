<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Compras;

class ComprasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops = [
            [
                'id_moneda' => 1,
                'tasa_cambio' => 1.00,
                'id_estatus' => 1
            ]
        ];
        foreach ($shops as $item) {
            Compras::create($item);
        }
    }
}
