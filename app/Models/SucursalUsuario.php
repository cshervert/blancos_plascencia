<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SucursalUsuario extends Model
{
    use HasFactory;
    protected $table = 'sucursales_usuarios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_sucursal',
        'id_usuario',
    ];
    public $timestamps = false;
}
