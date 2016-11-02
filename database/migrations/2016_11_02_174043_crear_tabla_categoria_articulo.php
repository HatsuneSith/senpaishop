<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCategoriaArticulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_articulo', function(Blueprint $table) {
            $table->integer('categoria_id')->unsigned();
            $table->integer('articulo_id')->unsigned();
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('articulo_id')->references('id')->on('articulos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
