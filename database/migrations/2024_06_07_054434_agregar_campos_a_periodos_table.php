<?php

use Illuminate\Support\Facades\DB;
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
        Schema::create('periodos', function (Blueprint $table) {
            $table->year('año')->default(DB::raw('(YEAR(CURRENT_DATE))'));
            $table->string('periodo')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('periodos', function (Blueprint $table) {
            $table->dropColumn('año');
            $table->dropColumn('periodo');
        });
    }
};
