<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;
    protected $table = 'compras';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_moneda',
        'tasa_cambio',
        'id_estatus'
    ];
}
