<?php

namespace App\Imports;

use App\Models\Categoria;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoriaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Categoria([
            'categoria'  => $row['categoria'],
            'id_departamento'  => $row['id_departamento'],
            'activo'    => ($row['activo'] == 1) ? true : false,
            'eliminado' => ($row['eliminado'] == 1) ? true : false
        ]);
    }
}
