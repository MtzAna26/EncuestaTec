<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EncuestaAlumno;

class Encuesta extends Model
{

    protected $fillable = [
        'titulo',
        'descripcion',
        'alumno_id',
        'comentario',
        'departamento_id',

    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function alumno()
{
    return $this->belongsTo(Alumno::class, 'alumno_id', 'no_control');
}

}