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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->tinyInteger('tipo')->unsigned()->default(0);
            $table->tinyInteger('dificultad')->unsigned()->default(0);
            $table->text('short_description');
            $table->text('long_description');
            $table->integer('tutor')->unsigned()->default(0);
            $table->foreignId('ruta_profesional_id')->constrained('ruta_profesionals'); // Clave foránea
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
        Schema::dropIfExists('cursos');
    }
};
