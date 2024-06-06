<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dep_centro_informacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id');
            $table->foreign('alumno_id', 'dep_centro_informacion_alumno_foreign')
                ->references('id')
                ->on('alumnos')
                ->onDelete('cascade');
            
                $table->unsignedBigInteger('periodo_id')->nullable();
                $table->foreign('periodo_id')
                    ->references('id')
                    ->on('periodos')
                    ->onDelete('set null'); 
                
            
            $table->string('no_control');
            $table->string('carrera');
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
            $table->decimal('promedio_final', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('dep_centro_informacion', function (Blueprint $table) {
            $table->dropForeign('dep_centro_informacion_alumno_foreign');
        });
        Schema::dropIfExists('dep_centro_informacion');
    }
};
