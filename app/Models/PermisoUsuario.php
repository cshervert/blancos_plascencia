<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoUsuario extends Model
{
    use HasFactory;
    protected $table = 'permisos_usuarios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_permiso',
        'id_usuario',
        'crear',
        'leer',
        'editar',
        'eliminar',
        'activo',
    ];
    public $timestamps = false;
}
