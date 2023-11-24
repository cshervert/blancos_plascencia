<?php

namespace App\Imports;

use App\Models\Sucursal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SucursalImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sucursal([
            'nombre'    => $row['nombre'],
            'domicilio' => $row['domicilio'],
            'numero_interior'     => ($row['numero_interior'] == null) ? '' : $row['numero_interior'],
            'numero_exterior'       => $row['numero_exterior'],
            'colonia'      => $row['colonia'],
            'cp'  => $row['cp'],
            'ciudad'    => $row['ciudad'],
            'estado' => $row['estado'],
            'email'     => $row['email'],
            'telefono'  => $row['telefono'],
            'celular'   => $row['celular'],
            'activo'    => ($row['activo'] == 1) ? true : false,
            'eliminado' => ($row['eliminado'] == 1) ? true : false
        ]);
    }
}
