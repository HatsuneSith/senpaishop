<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
	protected $table = "ventas";

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function articulos_carrito()
    {
    	return $this->hasMany('App\ArticuloCarrito', 'venta_id');
    }
}
