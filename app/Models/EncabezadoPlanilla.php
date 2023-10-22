<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncabezadoPlanilla extends Model
{
    use HasFactory;


    protected $table = "encabezado_nominas";
    protected $fillable =[
        'tipo_planilla_id',
        'periodo_inicial',
        'periodo_final',
        'mes',
        'ano',
        'fecha_creacion',
        'sku_empresa',
        'estado'
    ];
}
