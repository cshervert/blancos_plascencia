<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Estatus;

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
            ['estatus' => 'Pendiente'],
            ['estatus' => 'Completado'],
            ['estatus' => 'Cancelado']
        ];
        foreach ($estatus as $item) {
            Estatus::create($item);
        }
    }
}
