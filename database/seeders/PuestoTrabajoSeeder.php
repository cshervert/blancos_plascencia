<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PuestoTrabajo;

class PuestoTrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $puesto = [
            [
                'puesto' => 'Vendedor(a)',
                'id_departamento' => 1,
                'activo' => 1,
            ],
            [
                'puesto' => 'Almacenista',
                'id_departamento' => 2,
                'activo' => 1,
            ],
        ];
        foreach ($puesto as $item) {
            PuestoTrabajo::create($item);
        }
    }
}
