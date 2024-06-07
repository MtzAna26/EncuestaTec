<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('no_control');
            $table->string('carrera');
            $table->string('semestre'); 
            $table->timestamps();

            
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}

