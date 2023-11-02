<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_cliente',
        'clave',
        'representante',
        'nombre',
        'rfc',
        'curp',
        'telefono',
        'celular',
        'email',
        'no_precio',
        'limite_credito',
        'dias_credito',
        'id_facturacion',
    ];

}
