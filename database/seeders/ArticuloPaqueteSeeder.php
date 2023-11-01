<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ArticuloPaquete;

class ArticuloPaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles_package = [
            [
                'id_articulo'   => 1,
                'id_paquete'    => 1,
                'cantidad'      => 10
            ]
        ];
        foreach ($articles_package as $item) {
            ArticuloPaquete::create($item);
        }
    }
}
