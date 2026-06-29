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
        Schema::create('producto_presentacion', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_producto');
            $table->integer('id_presentacion')->index('id_presentacion');
            $table->integer('cantidad_unidades');
            $table->boolean('es_principal')->nullable()->default(false);

            $table->unique(['id_producto', 'id_presentacion'], 'unique_producto_presentacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_presentacion');
    }
};
