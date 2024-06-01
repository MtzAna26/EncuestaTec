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

        // Define el nombre del período
        $nombrePeriodo = '';
        if ($tipo == 'primer' || $tipo == 'tercer' || $tipo == 'quinto' || $tipo == 'septimo' || $tipo == 'noveno') {
            $nombrePeriodo = 'enero-junio';
        } else {
            $nombrePeriodo = 'agosto-diciembre';
        }
        $nombrePeriodo .= ' ' . date('Y');

        // Define las fechas de inicio y fin del período
        $añoActual = date('Y');
        $añoInicio = $añoActual;
        $añoFin = $añoActual;

        if ($tipo == 'primer' || $tipo == 'tercer' || $tipo == 'quinto' || $tipo == 'septimo' || $tipo == 'noveno') {
            $fechaInicio = $añoInicio . '-01-01'; // 1 de enero del año actual
            $fechaFin = $añoInicio . '-06-30'; // 30 de junio del año actual
        } else {
            $fechaInicio = $añoInicio . '-08-01'; // 1 de agosto del año actual
            $fechaFin = $añoFin . '-12-31'; // 31 de diciembre del año actual
        }

        // Retorna un arreglo con las fechas de inicio y fin del período y el nombre del período
        return [
            'nombre' => $nombrePeriodo,
            'inicio' => $fechaInicio,
            'fin' => $fechaFin,
        ];
    }
}
