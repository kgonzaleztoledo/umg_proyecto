<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleNomina extends Model
{
    use HasFactory;

    protected $fillable =[
        'encabezado_nominas_id',
        'empleado_id',
        'sku_empresa',
        'total_descuento',
        'dias_laborado',
        'bonificacion_ley',
        'total_hrs_extras',
        'sueldo_liquido',
        'salario',
        'estado'

    ];
}
