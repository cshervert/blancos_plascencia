<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    use HasFactory;
    protected $table = 'monedas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'codigo',
        'tasa_cambio',
        'pais'
    ];
    public $timestamps = false;
}
