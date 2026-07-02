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
        Schema::create('usuario_rol', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('id_rol');
            $table->timestamp('asignado_en')->notnull()->currentTimestamp();
            $table->primary('id_usuario', 'id_rol');
            $table->foreign('id_usuario', 'usuario')->references('id_usuario');
            $table->foreign('id_rol', 'rol') ->references('id_rol');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario_rol');
    }
};
