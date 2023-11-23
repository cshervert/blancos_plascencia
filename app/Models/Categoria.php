<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $fillable = [
        'categoria',
        'id_departamento',
        'activo',
        'eliminado'
    ];
    public $timestamps = false;

    public function departamento()
    {
        return $this->hasOne(Departamento::class, 'id', 'id_departamento');
    }
}
