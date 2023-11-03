<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    protected $table = 'sucursales';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'domicilio',
        'numero_interior',
        'numero_exterior',
        'colonia',
        'cp',
        'ciudad',
        'estado',
        'email',
        'telefono',
        'celular',
        'activo'
    ];
}
