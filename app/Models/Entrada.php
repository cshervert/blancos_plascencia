<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    protected $table = 'entradas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_compra',
        'id_articulo',
        'cantidad',
        'precio_compra',
        'precio_descuento',
        'factor',
        'es_precio_neto',
        'porcentaje_descuento',
        'id_impuesto',
        'id_proveedor'
    ];
}
