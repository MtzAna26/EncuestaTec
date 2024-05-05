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
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }
}
