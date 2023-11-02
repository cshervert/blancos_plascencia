<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\GrupoCliente;

class GrupoClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group_client = [
            [
                'id_grupo' => 1,
                'id_cliente' => 1,
            ]
        ];
        foreach ($group_client as $item) {
            GrupoCliente::create($item);
        }
    }
}
