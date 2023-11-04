<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'direccion',
        'ciudad',
        'telefono',
        'celular',
        'foto',
        'email',
        'username',
        'password',
        'id_sucursal',
        'id_rol',
        'activo',
    ];

    protected $hidden = [
        'password'
    ];

    public function sucursal()
    {
        return $this->hasOne(Sucursal::class, 'id', 'id_sucursal');
    }

    public function rol()
    {
        return $this->hasOne(Rol::class, 'id', 'id_rol');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes["password"] = bcrypt($value);
    }
}
