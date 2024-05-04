<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->default('Encuesta sin título');
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('alumno_id')->nullable(); // Cambiar a unsignedBigInteger
            $table->text('comentario')->nullable();
            $table->unsignedBigInteger('departamento_id');
            $table->integer('puntaje')->nullable();
            $table->integer('ratings')->nullable(); 
            $table->timestamps();

            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade'); // Cambiar a 'id'
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuestas');
    }
}
