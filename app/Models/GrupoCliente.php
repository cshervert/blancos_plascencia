<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoCliente extends Model
{
    use HasFactory;
    protected $table = 'grupos_clientes';
    protected $primaryKey = 'id';
    protected $fillable = ['id_grupo', 'id_cliente'];
    public $timestamps = false;
}
