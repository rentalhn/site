<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallesolicitud', function (Blueprint $table) {
            $table->integer('id_solicitud');
            $table->integer('id_maquinaria');
            $table->integer('Horas');                  
            $table->string('estado',100);
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
        Schema::dropIfExists('detallesolicitud');
    }
}
