<?php

namespace App\Imports;

use App\Models\Articulo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ArticuloImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Articulo([
            'clave' => $row['clave'],
            'clave_alterna' => $row['clave_alterna'],
            'es_servicio' => $row['es_servicio'],
            'descripcion' => $row['descripcion'],
            'id_categoria' => $row['id_categoria'],
            'id_unidad_compra' => $row['id_unidad_compra'],
            'id_unidad_venta' => $row['id_unidad_venta'],
            'factor' => $row['factor'],
            'id_impuesto' => $row['id_impuesto'],
            'precio_compra' => $row['precio_compra'],
            'es_precio_neto' => $row['es_precio_neto'],
            'id_precio' => $row['id_precio'],
            'id_moneda' => $row['id_moneda'],
            'tasa_cambio' => $row['tasa_cambio'],
            'clave_sat' => $row['clave_sat'],
            'inventario_min' => $row['inventario_min'],
            'inventario_max' => $row['inventario_max'],
            'localizacion' => $row['localizacion'],
            'imagenes' => $row['imagenes'],
            'caracteristicas' => $row['caracteristicas'],
            'etiquetas' => $row['etiquetas'],
            'activo' => $row['activo'],
            'eliminado' => $row['eliminado'],
        ]);
    }
}
