<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $table = 'departamentos';
    protected $fillable = [
        
        'email',
        'password',
    ];
    public function encuestas()
    {
        return $this->hasMany(Encuesta::class);
    }

    // Relación con la tabla de Alumnos
    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }

    public function calcularPromedioFinal()
    {
        // Obtener todos los alumnos asociados a este departamento
        $alumnos = $this->alumnos;

        // Calcular el promedio final de los alumnos
        $promedio_final_total = 0;
        $total_alumnos = count($alumnos);

        foreach ($alumnos as $alumno) {
            $promedio_final_total += $alumno->promedio_final;
        }

        // Evitar división por cero
        if ($total_alumnos > 0) {
            return $promedio_final_total / $total_alumnos;
        } else {
            return 0;
        }
    }
}
