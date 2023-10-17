<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = "perfil_informacion";
    protected $fillable = [
        'nombre_completo',
        'user_id',
        'email',
        'fecha_nacimiento',
        'genero',
        'direccion',
        'estado',
        'ciudad',
        'codigo_postal',
        'telefono_movil',
        'departamento',
        'puesto_designado',
        'jefe_inmediato',
    ];
}
