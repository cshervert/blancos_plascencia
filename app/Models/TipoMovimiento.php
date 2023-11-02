<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMovimiento extends Model
{
    use HasFactory;
    protected $table = 'tipos_movimientos';
    protected $primaryKey = 'id';
    protected $fillable = ['tipo'];
    public $timestamps = false;
}
