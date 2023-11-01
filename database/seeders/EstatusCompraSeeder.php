<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstatusCompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estatus = [
            ['nombre' => 'Pendiente'],
            ['nombre' => 'Completado'],
            ['nombre' => 'Cancelado']
        ];
        // foreach ($estatus as $status) {
            DB::table('estatus_compra')->insert($estatus);
        // }
    }
}
