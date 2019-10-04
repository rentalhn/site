<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->string('Identidad',100)-> unique();
            $table->string('Nombre',300);
            $table->string('Apellidos',300);
            $table->string('Direccion',500);
            $table->string('Correo_Electronico',250);
            $table->integer('Id_Localidad');
            $table->string('Estado',100);
            $table->timestamp('Fecha_Registro');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
