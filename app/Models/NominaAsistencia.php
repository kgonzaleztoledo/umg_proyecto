<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NominaAsistencia extends Model
{
    use HasFactory;
    protected $table = "nomina_asistencias";

    protected $fillable =[
        'empleado_id',
        'sku_empresa',
        'fecha_inicio',
        'fecha_final',
        'porcentaje',
        'total_dias',
        'h_extras',
        'mes',
        'ano',
        'estado',
    ];
}
