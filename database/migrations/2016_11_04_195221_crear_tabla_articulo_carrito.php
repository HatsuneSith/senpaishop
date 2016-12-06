<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaArticuloCarrito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo_carrito', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('carrito_id')->unsigned()->nullable();
            $table->integer('articulo_id')->unsigned();
            $table->integer('venta_id')->unsigned()->nullable();
            $table->integer('cantidad_articulo')->default(1);
            $table->integer('costo_individual');
            $table->timestamps();

            $table->foreign('carrito_id')->references('id')->on('carritos');
            $table->foreign('articulo_id')->references('id')->on('articulos');
            $table->foreign('venta_id')->references('id')->on('ventas');            
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
