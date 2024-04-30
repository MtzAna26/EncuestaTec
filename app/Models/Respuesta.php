<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $fillable = ['contenido', 'puntuacion', 'pregunta_id'];

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }

    public function encuesta()
    {
        return $this->belongsTo(Encuesta::class);
    }
}
