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
        Schema::table('producto_presentacion', function (Blueprint $table) {
            $table->foreign(['id_producto'], 'producto_presentacion_ibfk_1')->references(['id_producto'])->on('productos')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['id_presentacion'], 'producto_presentacion_ibfk_2')->references(['id_presentacion'])->on('presentaciones')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('producto_presentacion', function (Blueprint $table) {
            $table->dropForeign('producto_presentacion_ibfk_1');
            $table->dropForeign('producto_presentacion_ibfk_2');
        });
    }
};
