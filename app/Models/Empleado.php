<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = "empleados";
    protected $fillable = [
        'id',
        'empleado_id',
        'user_id',
        'user_id',
        'sku_empresa',
        'nombre_empleado',
        'email',
        'genero',
        'cui_dpi',
        'no_cuenta',
        'tipo_cuenta',
        'departamento',
        'puesto',
        'direccion',
        'celular',
        'fecha_inicio_laboral',
         'tipo_contrato',
         'salario'
    ];
}
