<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departamentos')->insert([
            [
                'nombre' => 'Departamento centro de informacion',
                'descripcion' => 'CENTRO DE INFORMACIÓN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Departamento coordinacion de carreras',
                'descripcion' => 'COORDINACIÓN DE CARRERAS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Departamento recursos financieros',
                'descripcion' => 'RECURSOS FINANCIEROS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Departamento residencias profesionales',
                'descripcion' => 'RESIDENCIAS PROFESIONALES',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Departamento centro de computo',
                'descripcion' => 'CENTRO DE CÓMPUTO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Departamento servicio social',
                'descripcion' => 'SERVICIO SOCIAL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Departamento servicios escolares',
                'descripcion' => 'SERVICIOS ESCOLARES',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Departamento becas',
                'descripcion' => 'BECAS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Departamento talleres y laboratorios',
                'descripcion' => 'TALLERES Y LABORATORIOS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Departamento cafeteria',
                'descripcion' => 'CAFETERIA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Departamento servicio medico',
                'descripcion' => 'SERVICIO MÉDICO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Departamento actividades culturales y deportivas',
                'descripcion' => 'ACTIVIDADES CULTURALES Y DEPORTIVAS',
                'created_at' => now(),
                'updated_at' => now(),
            ],
	]);
    }
}
