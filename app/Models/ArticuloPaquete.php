<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticuloPaquete extends Model
{
    use HasFactory;
    protected $table = 'articulos_paquetes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_articulo',
        'id_paquete',
        'cantidad'
    ];
    public $timestamps = false;
}
