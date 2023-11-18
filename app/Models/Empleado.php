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
        'fecha_nacimiento',
        'id_puesto',
        'id_sucursal',
        'activo',
        'eliminado',
    ];

    public function puesto_trabajo()
    {
        return $this->hasOne(PuestoTrabajo::class, 'id', 'id_puesto');
    }

    public function sucursal()
    {
        return $this->hasOne(Sucursal::class, 'id', 'id_sucursal');
    }
}
