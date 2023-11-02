<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SucursalInventario;

class SucursalInventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branch_inventory = [
            [
                'id_sucursal' => 1,
                'id_inventario' => 1,
                'existencia' => 10
            ]
        ];
        foreach ($branch_inventory as $item) {
            SucursalInventario::create($item);
        }
    }
}
