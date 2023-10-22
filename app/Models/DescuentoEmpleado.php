<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescuentoEmpleado extends Model
{
    use HasFactory;

    protected $table = "descuento_empleados";

    protected $fillable =[
        'empleados_id',
        'descuentos_id',
        'sku_empresa',
        'fecha_creacion',
        'porcentaje',
    ];
}
