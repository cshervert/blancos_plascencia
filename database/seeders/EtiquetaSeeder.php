<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Etiqueta;

class EtiquetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ['etiqueta' => 'Almohada', 'activo' => 1],
            ['etiqueta' => 'Frazada', 'activo' => 1]
        ];
        foreach ($tags as $tag) {
            Etiqueta::create($tag);
        }
    }
}
