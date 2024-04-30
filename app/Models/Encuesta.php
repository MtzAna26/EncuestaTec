<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }

}