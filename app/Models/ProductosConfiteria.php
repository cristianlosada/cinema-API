<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosConfiteria extends Model
{
    use HasFactory;
    protected $table = 'Productos_Confiteria';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'categoria',
        'imagen_producto'
    ];
}
