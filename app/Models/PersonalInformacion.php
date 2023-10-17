<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformacion extends Model
{
    use HasFactory;

    protected $table = "personal_informacion";
    protected $fillable = [
        'user_id',
        'cui_dpi',
        'fecha_vec_dpi',
        'nit',
        'no_licencia',
        'fecha_vec_licencia',
        'movil',
        'nacionalidad',
        'religion',
        'estado_civil',
        'total_hijos',
        'img_frontal_dpi',
        'img_atras_dpi',
        'img_penales',
        'img_policiacos',
        'pdf_cv'
    ];
}
