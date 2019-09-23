<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImgMaquinariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imgmaquinarias', function (Blueprint $table) {
            $table->Increments('Id_img_maquinaria')-> unique();
            $table->string('Descripcion_img_maquinaria',300);
            $table->binary('Data_img_maquinaria');
            $table->string('Estado',100);
            $table->timestamp('Fecha_registro');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imgmaquinarias');
    }
}
