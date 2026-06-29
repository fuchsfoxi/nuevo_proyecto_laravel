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
        Schema::table('producciones', function (Blueprint $table) {
            $table->foreign(['id_producto_presentacion'], 'producciones_ibfk_1')->references(['id'])->on('producto_presentacion')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['id_turno'], 'producciones_ibfk_2')->references(['id_turno'])->on('turnos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['id_usuario'], 'producciones_ibfk_3')->references(['id_usuario'])->on('usuarios')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('producciones', function (Blueprint $table) {
            $table->dropForeign('producciones_ibfk_1');
            $table->dropForeign('producciones_ibfk_2');
            $table->dropForeign('producciones_ibfk_3');
        });
    }
};
