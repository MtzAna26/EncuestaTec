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
    
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }
}