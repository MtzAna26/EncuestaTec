<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grafica extends Model
{
    use HasFactory;
    protected $fillable = ['ruta_imagen', 'periodo']; 

    protected $casts = [
        'datos' => 'array',
    ];

    /**
     * Obtiene los datos de la gráfica en formato JSON.
     *
     * @return array
     */
    public function obtenerDatosGrafica()
    {
        return $this->datos; 
    }
    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'periodo', 'nombre'); 
    }

}
