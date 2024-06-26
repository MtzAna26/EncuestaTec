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


    public  static function generarPeriodo($year = null)
    {
        // Si no se proporciona un año, usar el año actual
        $anio = $year ?? date('Y');

        // Calcular el período específico
        $mes = date('n');
        if ($mes <= 7) {
            // Enero-Julio (semestre par)
            $nombrePeriodo = "Enero-Julio $anio";
            $periodo = 'Par';
            $fechaInicio = "$anio-01-01";
            $fechaFin = "$anio-07-31";
        } else {
            // Agosto-Diciembre (semestre impar)
            $nombrePeriodo = "Agosto-Diciembre $anio";
            $periodo = 'Impar';
            $fechaInicio = "$anio-08-01";
            $fechaFin = "$anio-12-31";
        }

        return [
            'nombre' => $nombrePeriodo,
            'inicio' => $fechaInicio,
            'fin' => $fechaFin,
            'año' => $anio,
            'periodo' => $periodo,
        ];
    }
    
    /*
        public function generarPeriodo($year = null)
    {
        // Si no se proporciona un año, usar el año actual
        $anio = $year ?? date('Y');

        // Calcular el período específico
        $mes = date('n');
        if ($mes <= 7) {
            // Enero-Julio (semestre par)
            $nombrePeriodo = "Enero-Julio $anio";
            $periodo = 'Par';
            $fechaInicio = "$anio-01-01";
            $fechaFin = "$anio-07-31";
        } else {
            // Agosto-Diciembre (semestre impar)
            $nombrePeriodo = "Agosto-Diciembre $anio";
            $periodo = 'Impar';
            $fechaInicio = "$anio-08-01";
            $fechaFin = "$anio-12-31";
        }

        return [
            'nombre' => $nombrePeriodo,
            'inicio' => $fechaInicio,
            'fin' => $fechaFin,
            'año' => $anio,
            'periodo' => $periodo,
        ];
    }
*/

}
