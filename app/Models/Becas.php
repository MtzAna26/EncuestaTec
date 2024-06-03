<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Becas extends Model
{
    use HasFactory;
    protected $table = "dep_becas";

    protected $fillable = [
        'alumno_id',
        'no_control',
        'carrera',
        'Serpregunta_1',
        'Serpregunta_2',
        'Serpregunta_3',
        'Serpregunta_4',
        'Serpregunta_5',
        'comentario',
        'promedio_final',
        'periodo_id',
    ];


    public function calcularPromedioFinal()
    {
        $totalPreguntas = 5; // Total de preguntas SERP y Estruc
        $totalAlumnos = $this->alumno()->count(); // Obtener el número de alumnos que respondieron la encuesta
        $sumaPreguntas = $this->Serpregunta_1 + $this->Serpregunta_2 + $this->Serpregunta_3 + $this->Serpregunta_4 + $this->Serpregunta_5;
        
        if ($totalAlumnos > 0) {
            $this->promedio_final = $sumaPreguntas / ($totalPreguntas * $totalAlumnos);
        } else {
            $this->promedio_final = null;
        }
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->calcularPromedioFinal();
        });
    }


    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}
