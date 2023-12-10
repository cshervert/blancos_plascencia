<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;
    protected $table = 'paquetes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'clave',
        'clave_alterna',
        'es_servicio',
        'descripcion',
        'id_categoria',
        'id_unidad_venta',
        'id_impuesto',
        'precio_compra_promedio_neto',
        'precio_compra_promedio',
        'id_precio',
        'id_moneda',
        'tasa_cambio',
        'clave_sat',
        'localizacion',
        'imagenes',
        'caracteristicas',
        'etiquetas',
        'activo',
        'eliminado',
    ];

    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'id', 'id_categoria');
    }
}
