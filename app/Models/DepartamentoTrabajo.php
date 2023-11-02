<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartamentoTrabajo extends Model
{
    use HasFactory;
    protected $table = 'departamentos_trabajo';
    protected $primaryKey = 'id';
    protected $fillable = [
        'departamento',
        'activo',
    ];
    public $timestamps = false;
}
