<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departamento = [
            [
                'departamento' => 'Recamara',
                'activo' => 1,
                'eliminado' => 0,
            ],
            [
                'departamento' => 'Baño',
                'activo' => 1,
                'eliminado' => 0,
            ],
            [
                'departamento' => 'Sala',
                'activo' => 1,
                'eliminado' => 0,
            ],
            [
                'departamento' => 'Cocina',
                'activo' => 1,
                'eliminado' => 0,
            ],
            [
                'departamento' => 'Mascotas',
                'activo' => 1,
                'eliminado' => 0,
            ],
        ];
        foreach ($departamento as $item) {
            Departamento::create($item);
        }
    }
}
