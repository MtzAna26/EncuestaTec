<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alumnos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nip', 
        'no_control', 
        'carrera', 
        'semestre'
    ];

    public function centroinformacion()
    {
        return $this->hasOne('App\Models\CentroInformacion');
    }

    public function coordinacioncarreras()
    {
        return $this->hasOne('App\Models\CoordinacionCarreras');
    }

    public function recursosfinancieros()
    {
        return $this->hasOne('App\Models\RecursosFinancieros');
    }
    
    public function residenciasprofesionales()
    {
        return $this->hasOne('App\Models\ResidenciasProfesionales');
    }
    
    public function centrocomputo(){
        return $this->hasOne('App\Models\CentroComputo');
    }
}
