<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impuesto extends Model
{
    use HasFactory;
    protected $table = 'impuestos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'impuesto',
        'activo',
        'impreso',
        'impuesto_local',
        'id_desglose_impuesto',
        'id_tipo_impuesto',
        'orden',
        'aplicar_iva',
        'cuenta_clave',
        'eliminado'
    ];

    public function desglose()
    {
        return $this->hasOne(DesgloseImpuesto::class, 'id', 'id_desglose_impuesto');
    }

    public function tipo()
    {
        return $this->hasOne(TipoImpuesto::class, 'id', 'id_tipo_impuesto');
    }
}
