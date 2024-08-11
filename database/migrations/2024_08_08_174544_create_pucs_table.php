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
        Schema::create('pucs', function (Blueprint $table) {
            $table->id();
            $table->string('grupo_1');
            $table->string('grupo_2');
            $table->string('grupo_3');
            $table->string('codigo_cuenta');
            $table->string('nombre_cuenta');
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
        Schema::dropIfExists('pucs');
    }
};
