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
        Schema::table('produccion', function (Blueprint $table) {
            $table->foreign(['id_producto'], 'produccion_ibfk_1')->references(['id_producto'])->on('producto')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_turno'], 'produccion_ibfk_2')->references(['id_turno'])->on('turno')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produccion', function (Blueprint $table) {
            $table->dropForeign('produccion_ibfk_1');
            $table->dropForeign('produccion_ibfk_2');
        });
    }
};
