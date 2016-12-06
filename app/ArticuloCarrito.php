<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class ArticuloCarrito extends Model
{
	protected $table = 'articulo_carrito';	

	public function articulo()
	{
		return $this->belongsTo('App\Articulo');
	}

	public function carrito()
	{
		return $this->belongsTo('App\Carrito');
	}

    public function venta()
    {
    	return $this->belongsTo('App\Venta');
    }    

    /*
    *** FUNCIONES ***
	*/

	public function agrega_articulo($articulo_id, $carrito_id)
	{		
		$articulo_existe = ArticuloCarrito::where('articulo_id',$articulo_id)
								->where('carrito_id',$carrito_id)
								->first();

		if( count($articulo_existe) > 0) {
			$nueva_cantidad = $articulo_existe->cantidad_articulo .= 1;

			DB::table('articulo_carrito')
				->where('articulo_id', $articulo_id)
				->where('carrito_id', $carrito_id)
				->update(['cantidad_articulo' => $nueva_cantidad]);

			return false;
		}
		else {
			$nuevo_articulo = new ArticuloCarrito;
			$nuevo_articulo->articulo_id = $articulo_id;
			$nuevo_articulo->carrito_id = $carrito_id;
			$nuevo_articulo->costo_individual = Articulo::find($articulo_id)->precio;			
			$nuevo_articulo->save();
			return true;
		}
	}
}
