<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = [
            [
                'categoria' => 'Almohadas',
                'id_departamento' => 1,
                'activo' => 1,
            ],
            [
                'categoria' => 'Toallas',
                'id_departamento' => 2,
                'activo' => 1,
            ],
        ];
        foreach ($categoria as $item) {
            Categoria::create($item);
        }
    }
}
