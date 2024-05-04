<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('dep_centro_informacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id')->nullable();
            $table->string('no_control')->nullable();
            $table->string('carrera')->nullable();
            $table->integer('Serpregunta_1')->nullable();
            $table->integer('Serpregunta_2')->nullable();
            $table->integer('Serpregunta_3')->nullable();
            $table->integer('Serpregunta_4')->nullable();
            $table->integer('Serpregunta_5')->nullable();
            $table->integer('Serpregunta_6')->nullable();
            $table->integer('Serpregunta_7')->nullable();
            $table->integer('Estrucpregunta_1')->nullable();
            $table->integer('Estrucpregunta_2')->nullable();
            $table->integer('Estrucpregunta_3')->nullable();
            $table->integer('Estrucpregunta_4')->nullable();
            $table->integer('Estrucpregunta_5')->nullable();
            $table->integer('Estrucpregunta_6')->nullable();
            $table->text('comentario')->nullable();
            $table->timestamps();

            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dep_centro_informacion');
    }
};
