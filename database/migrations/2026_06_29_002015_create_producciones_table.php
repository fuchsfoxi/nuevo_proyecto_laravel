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
        Schema::create('producciones', function (Blueprint $table) {
            $table->integer('id_produccion', true);
            $table->integer('id_producto_presentacion')->index('id_producto_presentacion');
            $table->integer('id_turno')->index('id_turno');
            $table->integer('id_usuario')->index('id_usuario');
            $table->date('fecha_produccion');
            $table->integer('cantidad_presentaciones')->default(0);
            $table->integer('cantidad_total_unidades')->default(0);
            $table->integer('cantidad_agotada')->nullable()->default(0);
            $table->integer('cantidad_merma')->nullable()->default(0);
            $table->dateTime('hora_agotada')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producciones');
    }
};
