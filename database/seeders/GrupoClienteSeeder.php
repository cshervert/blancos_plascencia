<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grupo = [
            [
                'id_grupo' => 1,
                'id_cliente' => 1,
            ]
        ];
        DB::table('grupo_cliente')->insert($grupo);
    }
}
