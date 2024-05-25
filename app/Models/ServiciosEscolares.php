<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosEscolares extends Model
{
    use HasFactory;
    protected $table = 'dep_servicios_escolares';
    protected $fillable = [
        'alumno_id',
        'no_control',
        'carrera',
        'Serpregunta_1',
        'Serpregunta_2',
        'Serpregunta_3',
        'Serpregunta_4',
        
    ];
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }
}
