<?php

namespace App\Imports;

use App\Models\Cliente;
use App\Models\DatosFacturacion;
use App\Models\GrupoCliente;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClienteImport implements ToModel, WithHeadingRow
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

        $cliente = Cliente::create([
            'clave'     => $row['clave'],
            'representante'     => $row['representante'],
            'nombre'    => $row['nombre'],
            'rfc'       => $row['rfc'],
            'curp'      => $row['curp'],
            'telefono'  => $row['telefono'],
            'celular'   => $row['celular'],
            'email'     => $row['email'],
            'numero_precio' => $row['precio'],
            'limite_credito' => $row['limite_credito'],
            'dias_credito' => $row['dias_credito'],
            'id_facturacion' =>  $facturacion->id,
            'activo'    => ($row['activo'] == 1) ? true : false,
            'eliminado' => ($row['eliminado'] == 1) ? true : false
        ]);


        if($row['grupo'] != null){
            GrupoCliente::create([
                'id_cliente' => $cliente->id,
                'id_grupo' => $row['grupo']
            ]);
        }

        return $cliente;
    }
}