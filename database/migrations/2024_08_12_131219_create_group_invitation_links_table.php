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
        Schema::create('group_invitation_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Usuario creador
            $table->foreignId('group_id')->constrained()->onDelete('cascade'); // Grupo al que se unirá
            $table->string('invitation_key')->unique(); // Clave única del enlace
            $table->timestamp('expires_at'); // Fecha de expiración del enlace
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_invitation_links');
    }
};
