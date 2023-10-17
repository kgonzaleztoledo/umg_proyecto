<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPlanilla extends Model
{
    use HasFactory;
    protected $table = "tipo_planillas";
    protected $fillable = [
        'nombre',
        'sku_empresa'
    ];
}
