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
        Schema::create('user_workshop_entries', function (Blueprint $table) {
            $table->id();
            $table->integer('value_input');
            $table->string('cod_input');
            $table->string('verify_value');
            $table->foreignId('userworkshop_id')->constrained('user_workshops')->onDelete('cascade');
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
        Schema::dropIfExists('user_workshop_entries');
    }
};
