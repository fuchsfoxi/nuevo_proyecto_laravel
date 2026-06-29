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
            $table->integer('id_empleado', true);
            $table->integer('id_usuario')->nullable()->unique('id_usuario');
            $table->string('nombre_empleado', 100);
            $table->string('apellido_empleado', 100)->nullable();
            $table->string('dni', 20)->nullable()->unique('dni');
            $table->string('telefono', 15)->nullable();
            $table->boolean('activo')->nullable()->default(true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
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
