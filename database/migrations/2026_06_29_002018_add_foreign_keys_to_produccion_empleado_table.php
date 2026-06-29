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
        Schema::table('produccion_empleado', function (Blueprint $table) {
            $table->foreign(['id_produccion'], 'produccion_empleado_ibfk_1')->references(['id_produccion'])->on('producciones')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_empleado'], 'produccion_empleado_ibfk_2')->references(['id_empleado'])->on('empleados')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produccion_empleado', function (Blueprint $table) {
            $table->dropForeign('produccion_empleado_ibfk_1');
            $table->dropForeign('produccion_empleado_ibfk_2');
        });
    }
};
