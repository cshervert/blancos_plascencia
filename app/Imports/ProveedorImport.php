<?php

namespace App\Imports;

use App\Models\Proveedor;
use App\Models\DatosFacturacion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProveedorImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $facturacion = DatosFacturacion::create([
            'razon_social' => $row['razon'],
            'rfc' => $row['rfc_factura'],
            'curp' => $row['curp_factura'],
            'domicilio' => $row['domicilio'],
            'numero_interior' => $row['numero_interior'],
            'numero_exterior' => $row['numero_exterior'],
            'colonia' => $row['colonia'],
            'cp' => $row['cp'],
            'ciudad' => $row['ciudad'],
            'localidad' => $row['localidad'],
            'estado' => $row['estado'],
            'pais' => $row['pais'],
        ]);

        return new Proveedor([
            'representante'     => $row['representante'],
            'nombre'    => $row['nombre'],
            'alias'     => $row['alias'],
            'rfc'       => $row['rfc'],
            'curp'      => $row['curp'],
            'telefono'  => $row['telefono'],
            'celular'   => $row['celular'],
            'email'     => $row['email'],
            'comentario' => $row['comentario'],
            'limite_credito' => $row['limite_credito'],
            'dias_credito' => $row['dias_credito'],
            'id_facturacion' =>  $facturacion->id,
            'activo'    => ($row['activo'] == 1) ? true : false,
            'eliminado' => ($row['eliminado'] == 1) ? true : false
        ]);
    }
}
