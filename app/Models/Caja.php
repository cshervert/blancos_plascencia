<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    use HasFactory;
    protected $table = 'cajas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'id_sucursal',
        'activo'
    ];
}
