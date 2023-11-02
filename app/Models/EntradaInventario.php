<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntradaInventario extends Model
{
    use HasFactory;
    protected $table = 'entradas_inventarios';
    protected $primaryKey = 'id';
    protected $fillable = ['id_entrada', 'id_inventario'];
    public $timestamps = false;
}
