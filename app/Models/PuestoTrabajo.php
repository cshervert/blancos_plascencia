<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuestoTrabajo extends Model
{
    use HasFactory;
    protected $table = 'puestos_trabajo';
    protected $primaryKey = 'id';
    protected $fillable = [
        'puesto',
        'activo'
    ];
    public $timestamps = false;
}
