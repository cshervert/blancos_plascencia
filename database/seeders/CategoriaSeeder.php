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
            ['categoria' => 'Almohadas', 'id_departamento' => 1, 'activo' => true, 'eliminado' => false,],
            ['categoria' => 'Protectores ', 'id_departamento' => 1, 'activo' => true, 'eliminado' => false,],
            ['categoria' => 'Sabanas ', 'id_departamento' => 1, 'activo' => true, 'eliminado' => false,],
            ['categoria' => 'Colchas', 'id_departamento' => 1, 'activo' => true, 'eliminado' => false,],
            ['categoria' => 'Cortinas', 'id_departamento' => 1, 'activo' => true, 'eliminado' => false],
            ['categoria' => 'Colchonetas ', 'id_departamento' => 1, 'activo' => true, 'eliminado' => false],
            ['categoria' => 'Toallas ', 'id_departamento' => 2, 'activo' => true, 'eliminado' => false],
            ['categoria' => 'Batas de Baño', 'id_departamento' => 2, 'activo' => true, 'eliminado' => false],
            ['categoria' => 'Juegos de Baño ', 'id_departamento' => 2, 'activo' => true, 'eliminado' => false],
            ['categoria' => 'Cortinas de Baño', 'id_departamento' => 2, 'activo' => true, 'eliminado' => false],
            ['categoria' => 'Tapetes ', 'id_departamento' => 2, 'activo' => true, 'eliminado' => false],
            ['categoria' => 'Cubresalas ', 'id_departamento' => 3, 'activo' => true, 'eliminado' => false],
            ['categoria' => 'Manteles y caminos demesa', 'id_departamento' => 3, 'activo' => true, 'eliminado' => false],
            ['categoria' => 'Cortinas cocina', 'id_departamento' => 4, 'activo' => true, 'eliminado' => false],
            ['categoria' => 'Camas mascota', 'id_departamento' => 5, 'activo' => true, 'eliminado' => false]
        ];
        foreach ($categoria as $item) {
            Categoria::create($item);
        }
    }
}
