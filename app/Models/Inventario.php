<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $table = 'inventarios';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_articulo',
        'existencia_inicial',
        'entradas',
        'salidas',
        'existencia'
    ];
}
