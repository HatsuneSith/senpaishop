<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Carrito extends Model
{
    public function articulos()
    {
    	return $this->hasMany('App\ArticuloCarrito', 'carrito_id');
    }

    public function usuario()
    {
    	return $this->hasOne('App\Usuario');
    }

    public function calcular_total()
    {
    	$articulos = $this->articulos;
    	$total = 0;
    	foreach($articulos as $articulo) {
    		$total += $articulo->cantidad_articulo * $articulo->costo_individual;            
    	}

    	return $total;
    }

    public function limpia_carrito($venta_id)
    {
    	$articulos = $this->articulos;        
    	foreach($articulos as $ac) {
            DB::table('articulo_carrito')
                ->where('carrito_id', $ac->carrito->id)
                ->where('articulo_id', $ac->articulo->id)
                ->where('venta_id', $venta_id)
                ->update(['carrito_id' => null]);
    	}
    }

    public function total_articulos()
    {
        $articulos = $this->articulos;
        $total = 0;
        foreach($articulos as $ac)
        {
            $total += $ac->cantidad_articulo;
        }

        return $total;
    }
}
