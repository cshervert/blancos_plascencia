<?php

namespace App\Imports;

use App\Models\Departamento;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DepartamentoImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Departamento([
            'departamento' =>  $row['departamento'],
            'activo'    => ($row['activo'] == 1) ? true : false,
            'eliminado' => ($row['eliminado'] == 1) ? true : false
        ]);
    }
}
