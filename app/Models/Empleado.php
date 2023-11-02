<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados';
    protected $primaryKey = 'id';

    protected $fillable = [
        'alias',
        'nombre',
        'direccion',
        'nss',
        'curp',
        'ciudad',
        'telefono',
        'celular',
        'email',
        'comision',
        'fecha_nac',
        'id_puesto',
        'activo',
    ];
}
