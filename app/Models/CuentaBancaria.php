<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaBancaria extends Model
{
    use HasFactory;
    protected $table = 'cuentas_bancarias';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cuenta',
        'sucursal',
        'clave',
        'banco',
        'cuenta_contable',
        'mostrar',
        'id_empresa'
    ];
}
