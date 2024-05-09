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
        Schema::create('buzon_quejas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 
            
            $table->foreign('user_id')->references('id')
            ->on('users')
            ->onDelete('cascade'); 

            $table->string('carrera');
            $table->string('tipo_comentario');
            $table->string('departamento');
            $table->string('contacto', 50);
            $table->string('mensaje');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buzon_quejas');
    }
};
