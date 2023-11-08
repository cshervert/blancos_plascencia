<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoRol extends Model
{
    use HasFactory;
    protected $table = 'permisos_roles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_permiso',
        'id_rol',
        'crear',
        'leer',
        'editar',
        'eliminar'
    ];
    public $timestamps = false;
}
