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
        Schema::create('produccion_empleado', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_produccion');
            $table->integer('id_empleado')->index('id_empleado');
            $table->string('rol_en_turno', 50)->nullable()->default('Operario');

            $table->unique(['id_produccion', 'id_empleado'], 'unique_empleado_produccion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produccion_empleado');
    }
};
