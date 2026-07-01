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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre', 150)->notNull();
            $table->string('gmail', 100)->notNull()->unique();
            $table->string('password_hash', 255)->notNull();
            $table->boolean('activo')->default(true);
            $table->timestamp('created_at')->notNull()->currentTimestamp();
            $table->timestamp('updated_at')->notNull()->currentTimestamp();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
