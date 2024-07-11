<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // ID
            $table->string('code', 20)->unique(); // Código alfanumérico aleatorio único de 20 caracteres
            $table->string('email'); // Correo del usuario
            $table->string('password'); // Password del usuario
            $table->string('first_name'); // First name
            $table->string('last_name'); // Last name
            $table->timestamps(); // Timestamps (created_at y updated_at)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
