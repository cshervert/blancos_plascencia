<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    use HasFactory;
    protected $table = 'precios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'utilidad_1',
        'precio_venta_1',
        'precio_venta_neto_1',
        'unidad_mayoreo_1',
        'utilidad_2',
        'precio_venta_2',
        'precio_venta_neto_2',
        'unidad_mayoreo_2',
        'utilidad_3',
        'precio_venta_3',
        'precio_venta_neto_3',
        'unidad_mayoreo_3',
        'utilidad_4',
        'precio_venta_4',
        'precio_venta_neto_4',
        'unidad_mayoreo_4',
        'es_articulo',
    ];
}
