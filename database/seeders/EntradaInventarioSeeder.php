<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EntradaInventario;

class EntradaInventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entries = [
            [
                'id_entrada'     => 1,
                'id_inventario'  => 1,
            ]
        ];
        foreach ($entries as $item) {
            EntradaInventario::create($item);
        }
    }
}
