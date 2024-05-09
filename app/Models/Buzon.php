<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buzon extends Model
{
    
    use HasFactory;
    protected $table = "buzon_quejas";

    protected $fillable = [
        'carrera',
        'tipo_comentario',
        'departamento',
        'contacto',
        'mensaje',
    ];
}
