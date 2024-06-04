<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grafica extends Model
{
    use HasFactory;
    protected $fillable = ['periodo', 'datos']; // Especifica los campos que pueden ser llenados en masa

    protected $casts = [
        'datos' => 'array', // La columna 'datos' será casted automáticamente a un array cuando se acceda
    ];

    /**
     * Obtiene los datos de la gráfica en formato JSON.
     *
     * @return array
     */
    public function obtenerDatosGrafica()
    {
        return $this->datos; // Retorna los datos de la gráfica almacenados en la columna 'datos'
    }
    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'periodo', 'nombre'); // Utiliza 'nombre' como la columna en 'periodos' que se relaciona con 'graficas'
    }

}
