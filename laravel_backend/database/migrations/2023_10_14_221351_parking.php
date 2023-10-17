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
        Schema::create('parking', function (Blueprint $table) {
            $table->id();
            $table->string('vehiculo_placa');
            $table->string('conductor_nombre');
            $table->dateTime('entrada');
            $table->dateTime('salida')->nullable();
            $table->string('total')->nullable();
            $table->string('formato_horas')->nullable();
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
        Schema::dropIfExists('parking');
    }
};
