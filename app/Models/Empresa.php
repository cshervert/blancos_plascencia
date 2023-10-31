<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $table = 'empresas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'rfc',
        'curp',
        'domicilio',
        'numero_interior',
        'numero_exterior',
        'colonia',
        'cp',
        'ciudad',
        'estado',
        'email',
        'telefono',
        'celular'
    ];
}
