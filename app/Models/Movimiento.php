<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;
    protected $table = 'movimientos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_tipo_movimiento',
        'id_sucursal_origen',
        'id_sucursal_destino',
        'cantidad'
    ];
}
