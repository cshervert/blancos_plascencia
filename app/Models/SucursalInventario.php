<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SucursalInventario extends Model
{
    use HasFactory;
    protected $table = 'sucursal_inventarios';
    protected $primaryKey = 'id';
    protected $fillable = ['id_sucursal', 'id_inventario', 'existencia'];
    public $timestamps = false;
}
