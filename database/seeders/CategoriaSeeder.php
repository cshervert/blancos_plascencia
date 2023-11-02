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
            ['categoria' => 'Almohadas', 'id_departamento' => 1, 'activo' => true],
            ['categoria' => 'Protectores ', 'id_departamento' => 1, 'activo' => true],
            ['categoria' => 'Sabanas ', 'id_departamento' => 1, 'activo' => true],
            ['categoria' => 'Colchas', 'id_departamento' => 1, 'activo' => true],
            ['categoria' => 'Cortinas', 'id_departamento' => 1, 'activo' => true],
            ['categoria' => 'Colchonetas ', 'id_departamento' => 1, 'activo' => true],
            ['categoria' => 'Toallas ', 'id_departamento' => 2, 'activo' => true],
            ['categoria' => 'Batas de Baño', 'id_departamento' => 2, 'activo' => true],
            ['categoria' => 'Juegos de Baño ', 'id_departamento' => 2, 'activo' => true],
            ['categoria' => 'Cortinas de Baño', 'id_departamento' => 2, 'activo' => true],
            ['categoria' => 'Tapetes ', 'id_departamento' => 2, 'activo' => true],
            ['categoria' => 'Cubresalas ', 'id_departamento' => 3, 'activo' => true],
            ['categoria' => 'Manteles y caminos demesa', 'id_departamento' => 3, 'activo' => true],
            ['categoria' => 'Cortinas cocina', 'id_departamento' => 4, 'activo' => true],
            ['categoria' => 'Camas mascota', 'id_departamento' => 5, 'activo' => true]
        ];
        foreach ($categoria as $item) {
            Categoria::create($item);
        }
    }
}
