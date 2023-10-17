<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDepartamento extends Model
{
    use HasFactory;
    protected $table = "personal_departamentos";
    protected $fillable = [
        'nombre',
        'descripcion',
        'sku_empresa'
    ];
}
