<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DepartamentoTrabajo;

class DepartamentoTrabajoSeeder extends Seeder
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
                'departamento' => 'Ventas',
                'activo' => 1,
            ],
            [
                'departamento' => 'Almacen',
                'activo' => 1,
            ],
        ];
        foreach ($departamento as $item) {
            DepartamentoTrabajo::create($item);
        }
    }
}
