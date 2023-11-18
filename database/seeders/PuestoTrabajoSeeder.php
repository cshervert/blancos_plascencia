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
                'puesto' => 'Director Comercial',
                'activo' => 1,
            ],
            [
                'puesto' => 'Gerente Tienda',
                'activo' => 1,
            ],
            [
                'puesto' => 'SubGerente Tienda',
                'activo' => 1,
            ],
            [
                'puesto' => 'Vendedor(a)',
                'activo' => 1,
            ],
            [
                'puesto' => 'Almacenista',
                'activo' => 1,
            ],
            [
                'puesto' => 'Comprador(a)',
                'activo' => 1,
            ],
        ];
        foreach ($puesto as $item) {
            PuestoTrabajo::create($item);
        }
    }
}
