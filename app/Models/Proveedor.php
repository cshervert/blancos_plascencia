<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedores';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_proveedor',
        'representante',
        'nombre',
        'alias',
        'rfc',
        'curp',
        'telefono',
        'celular',
        'email',
        'comentario',
        'limite_credito',
        'dias_credito',
        'id_facturacion',
    ];
}
