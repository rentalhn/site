<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoMaquinariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipomaquinaria', function (Blueprint $table) {
            $table->Increments('Id_tipo_maquinaria')-> unique();
            $table->string('Tipo_maquinaria',300);
            $table->string('Descripcion',300);       
            $table->string('Estado',100);
            $table->timestamp('Fecha_registro');
            $table->integer('Id_Localidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipomaquinaria');
    }
}
