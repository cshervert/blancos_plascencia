<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesgloseImpuesto extends Model
{
    use HasFactory;
    protected $table = 'desgloses_impuestos';
    protected $primaryKey = 'id';
    protected $fillable   = ['nombre'];
    public $timestamps    = false;
}
