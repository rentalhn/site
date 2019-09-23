<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaquinariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquinaria', function (Blueprint $table) {
            $table->Increments('id_maquinaria')-> unique();
            $table->string('Nombre_maquinaria',300);
            $table->string('Descripcion_maquinaria',500);            
            $table->string('Detalles_maquinaria',1000);
            $table->string('Disponibilidad',100);
            $table->double('Precio_x_Hora');
            $table->string('Operacion',300);
            $table->double('Latitud',20,20);
            $table->double('Longitud',20,20);
            $table->double('Precio_venta');
            $table->string('Estado',100);
            $table->timestamp('Fecha_registro');
            $table->integer('Id_Localidad');
            $table->integer('Identidad');
            $table->integer('Id_tipo_maquinaria');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maquinaria');
    }
}
