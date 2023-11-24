<?php

namespace App\Imports;

use App\Models\Empleado;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmpleadosImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Empleado([
            'alias'     => $row['alias'],
            'nombre'    => $row['nombre'],
            'direccion' => $row['direccion'],
            'nss'       => $row['nss'],
            'curp'      => $row['curp'],
            'ciudad'    => $row['ciudad'],
            'telefono'  => $row['telefono'],
            'celular'   => $row['celular'],
            'email'     => $row['email'],
            'comision'  => $row['comision'],
            'fecha_nacimiento' => $row['fecha_nacimiento'],
            'id_puesto' => $row['id_puesto'],
            'id_sucursal' => $row['id_sucursal'],
            'activo'    => ($row['activo'] == 1) ? true : false,
            'eliminado' => ($row['eliminado'] == 1) ? true : false
        ]);
    }
}
