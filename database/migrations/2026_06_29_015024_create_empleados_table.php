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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('id_empleado');
            $table->string('nombre', 100)->notNull();
            $table->string('DNI', 8)->unique();
            $table->string('telefono', 9)->unique();
            $table->string('puesto', 100)->notNull();
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->foreign('id_usuario', 'usuario')->references('id_usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
