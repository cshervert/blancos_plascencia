<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected $table = 'articulos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'clave',
        'clave_alterna',
        'es_servicio',
        'descripcion',
        'id_categoria',
        'id_unidad_compra',
        'id_unidad_venta',
        'factor',
        'id_impuesto',
        'precio_compra',
        'es_precio_neto',
        'id_precio',
        'id_moneda',
        'tasa_cambio',
        'clave_sat',
        'inventario_min',
        'inventario_max',
        'localizacion',
        'imagenes',
        'caracteristicas',
        'etiquetas',
        'activo',
    ];
}
