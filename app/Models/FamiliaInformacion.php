<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamiliaInformacion extends Model
{
    use HasFactory;

    protected $table = "familia_informacion";
    protected $fillable = [
        'user_id',
        'primer_nombre',
        'segundo_nombre',
        'otros_nombres',
        'primer_apellido',
        'segundo_apellido',
        'apellido_casada',
        'parentesco',
        'fecha_nacimiento',
        'movil',
        'contacto_emergencia'
    ];
}
