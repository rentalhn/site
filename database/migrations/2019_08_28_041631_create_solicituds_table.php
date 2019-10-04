<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud', function (Blueprint $table) {
            $table->Increments('Id_solicitud')-> unique();
            $table->timestamp('Fecha_solicitud');
            $table->string('Identidad',100);
            $table->integer('Localidad');                        
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
        Schema::dropIfExists('solicitud');
    }
}
