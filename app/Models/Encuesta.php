<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{

    protected $table = 'encuestas';
    protected $fillable = [
        'pregunta',
        'comentario',
        'puntuacion',
    ];

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class);
    }
}
