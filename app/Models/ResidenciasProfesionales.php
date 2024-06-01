<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenciasProfesionales extends Model
{
    use HasFactory;
    protected $table = 'dep_residencias_profesionales';
    protected $fillable = [
        'alumno_id',
        'no_control',
        'carrera',
        'Serpregunta_1',
        'Serpregunta_2',
        'Serpregunta_3',
        'Serpregunta_4',
        'Serpregunta_5',
        'Serpregunta_6',
        'Serpregunta_7',
        'Serpregunta_8',
        'Serpregunta_9',
        'comentario'
    ];


    public function calcularPromedioFinal()
    {
        $totalPreguntas = 9; // Total de preguntas SERP y Estruc
        $totalAlumnos = $this->alumno()->count(); // Obtener el número de alumnos que respondieron la encuesta
        $sumaPreguntas = $this->Serpregunta_1 + $this->Serpregunta_2 + $this->Serpregunta_3 + $this->Serpregunta_4 + $this->Serpregunta_5 + $this->Serpregunta_6 + $this->Serpregunta_7 + $this->Serpregunta_8 + $this->Serpregunta_9;
        
        if ($totalAlumnos > 0) {
            $this->promedio_final = $sumaPreguntas / ($totalPreguntas * $totalAlumnos);
        } else {
            $this->promedio_final = null;
        }
    }


    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }
}
