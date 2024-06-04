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
    
    public function serviciosocial(){
        return $this->hasOne('App\Models\ServicioSocial');
    }

    public function serviciosescolars(){
        return $this->hasOne('App\Models\ServiciosEscolares');
    }
    public function becas(){
        return $this->hasOne('App\Models\Becas');
    }
    public function tallereslaboratorios(){
        return $this->hasOne('App\Models\TallesLaboratorios');
    }
    public function cafeteria(){
        return $this->hasOne('App\Models\Cafeteria');
    }
    public function serviciomedico()
    {
        return $this->hasOne('App\Models\ServicioMedico');
    }
    public function actividadesculturalesdeportivas()
    {
        return $this->hasOne('App\Models\ActividadesCulturalesDeportivas');
    }

public function encuestas()
    {
        return $this->hasMany(Encuesta::class);
    }


    public function generarPeriodo($semestre)
    {
        // Divide el semestre en su número y tipo
        list($numero, $tipo) = explode("_", $semestre);
    
        // Define el nombre del periodo
        $nombrePeriodo = '';
        if ($tipo == 'primer' || $tipo == 'tercer' || $tipo == 'quinto' || $tipo == 'septimo' || $tipo == 'noveno') {
            $nombrePeriodo = 'enero-junio';
        } else {
            $nombrePeriodo = 'agosto-diciembre';
        }
    
        // Define las fechas de inicio y fin del periodo
        $añoActual = date('Y');
        $añoSiguiente = date('Y') + 1;
    
        $fechaInicio = ($tipo == 'primer' || $tipo == 'tercer' || $tipo == 'quinto' || $tipo == 'septimo' || $tipo == 'noveno') ?
            "$añoActual-01-01" :
            "$añoActual-08-01";
    
        $fechaFin = ($tipo == 'primer' || $tipo == 'tercer' || $tipo == 'quinto' || $tipo == 'septimo' || $tipo == 'noveno') ?
            "$añoActual-06-30" :
            "$añoActual-12-31";
    
        // Si el semestre es segundo, cuarto, sexto u octavo, ajustamos las fechas para el siguiente año académico
        if ($tipo == 'segundo' || $tipo == 'cuarto' || $tipo == 'sexto' || $tipo == 'octavo') {
            $fechaInicio = "$añoSiguiente-01-01";
            $fechaFin = "$añoSiguiente-06-30";
        }
    
        // Retorna un arreglo con las fechas de inicio y fin del periodo y el nombre del periodo
        return [
            'nombre' => $nombrePeriodo . ' ' . $añoActual,
            'inicio' => $fechaInicio,
            'fin' => $fechaFin,
        ];
    }
    
}
