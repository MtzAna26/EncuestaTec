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
        Schema::table('dep_becas', function (Blueprint $table) {
            $table->string('semestre')->nullable()->after('carrera');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dep_becas', function (Blueprint $table) {
            $table->dropColumn('semestre');
        });
    }
};
