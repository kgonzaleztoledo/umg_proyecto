<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = "empresas";
    protected $fillable =[
        'sku_empresa', 'nombre', 'contacto_persona', 'email', 'direccion', 'telefono', 'movil', 'logo', 'sitio_web',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
