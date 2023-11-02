<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosFacturacion extends Model
{
    use HasFactory;
    protected $table = 'datos_facturacion';
    protected $primaryKey = 'id';
    protected $fillable = [
        'razon_social',
        'rfc',
        'curp',
        'domicilio',
        'numero_interior',
        'numero_exterior',
        'colonia',
        'cp',
        'ciudad',
        'localidad',
        'estado',
        'pais',
    ];
}
