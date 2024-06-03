<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroInformacion extends Model
{
    use HasFactory;
    
    protected $table = 'dep_centro_informacion';
    
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
        'Estrucpregunta_1',
        'Estrucpregunta_2',
        'Estrucpregunta_3',
        'Estrucpregunta_4',
        'Estrucpregunta_5',
        'Estrucpregunta_6',
        'comentario',
        'promedio_final',
        'periodo_id',
    ];


    public function calcularPromedioFinal()
    {
        $totalPreguntas = 13; 
        $totalAlumnos = $this->alumno()->count(); 
        $sumaPreguntas = $this->Serpregunta_1 + $this->Serpregunta_2 + $this->Serpregunta_3 + $this->Serpregunta_4 + $this->Serpregunta_5 + $this->Serpregunta_6 + $this->Serpregunta_7 + $this->Estrucpregunta_1 + $this->Estrucpregunta_2 + $this->Estrucpregunta_3 + $this->Estrucpregunta_4 + $this->Estrucpregunta_5 + $this->Estrucpregunta_6;
        
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
