<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
	protected $table = "articulos";

    public function imagenes()
    {
        return $this->hasMany('App\Imagen');
    }

    public function ventas()
    {
        return $this->hasMany('App\Venta');
    }

    public function valoraciones()
    {
        return $this->hasMany('App\Valoracion');
    }

    public function sub_categorias()
    {
    	return $this->belongsTo('App\SubCategoria');
	}
}
