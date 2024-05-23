<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teatro extends Model
{
    use HasFactory;
    protected $table = 'salas_cine';

    protected $fillable = [
        'id_sala',
        'nombre',
        'descripcion',
        'numero_sala',
        'capacidad',
        'tipo_pantalla',
        'caracteristicas especiales'
    ];
}
