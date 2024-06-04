<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = 'periodos';

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function CentroInformacion()
    {
        return $this->hasMany(CentroInformacion::class);
    }

    public function CoordinacionCarreras()
    {
        return $this->hasMany(CoordinacionCarreras::class);
    }

    public function RecursosFinancieros()
    {
        return $this->hasMany(RecursosFinancieros::class);
    }

    public function ResidenciasProfesionales()
    {
        return $this->hasMany(ResidenciasProfesionales::class);
    }

    public function CentroComputo()
    {
        return $this->hasMany(CentroComputo::class);
    }

    public function ServicioSocial()
    {
        return $this->hasMany(ServicioSocial::class);
    }

    public function ServiciosEscolares()
    {
        return $this->hasMany(ServiciosEscolares::class);
    }

    public function Becas()
    {
        return $this->hasMany(Becas::class);
    }

    public function TalleresLaboratorios()
    {
        return $this->hasMany(TalleresLaboratorios::class);
    }

    public function Cafeteria()
    {
        return $this->hasMany(Cafeteria::class);
    }

    public function ServicioMedico()
    {
        return $this->hasMany(ServicioMedico::class);
    }

    public function ActividadesCulturalesDeportivas()
    {
        return $this->hasMany(ActividadesCulturalesDeportivas::class);
    }

}
