<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'clave',
        'representante',
        'nombre',
        'rfc',
        'curp',
        'telefono',
        'celular',
        'email',
        'numero_precio',
        'limite_credito',
        'dias_credito',
        'id_facturacion',
        'activo',
        'eliminado'
    ];

    public function datos_facturacion()
    {
        return $this->hasOne(DatosFacturacion::class, 'id', 'id_facturacion');
    }

    public function grupo()
    {
        return $this->hasOne(GrupoCliente::class, 'id_cliente', 'id');
    }

}
