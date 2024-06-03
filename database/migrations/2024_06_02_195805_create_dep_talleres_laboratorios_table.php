<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dep_talleres_laboratorios', function (Blueprint $table) {
            $table->unsignedBigInteger('alumno_id');
            $table->foreign('alumno_id', 'dep_talleres_laboratorios_alumno_foreign')
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
            $table->text('comentario')->nullable();
            $table->decimal('promedio_final', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dep_talleres_laboratorios', function (Blueprint $table) {
            $table->dropForeign('dep_talleres_laboratorios_alumno_foreign');
        });
        Schema::dropIfExists('dep_talleres_laboratorios');
    }
};
