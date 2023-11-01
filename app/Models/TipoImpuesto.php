<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoImpuesto extends Model
{
    use HasFactory;
    protected $table = 'tipos_impuestos';
    protected $primaryKey = 'id';
    protected $fillable   = ['nombre'];
    public $timestamps    = false;
}
