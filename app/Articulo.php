<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Articulo extends Model
{
	protected $table = "articulos";

    public function imagenes()
    {
        return $this->hasMany('App\Imagen');
    }

    public function valoraciones()
    {
        return $this->hasMany('App\Valoracion');
    }

    public function subcategorias()
    {
        return $this->belongsToMany('App\SubCategoria', 'subcategoria_articulo');
    }

    public function articulos_carritos()
    {
        return $this->hasMany('App\ArticuloCarrito', 'articulo_id');
    }

    public function ventas()
    {
        return $this->articulos_carritos->ventas;
    }

    public function ruta_imagen()
    {
        if( count( $this->imagenes ) == 0 ) {
            return asset('/img/art_default.png');
        }
        else {
            return asset('../storage/app/articulos/' . $this->id . "/" . $this->id . '.png');
        }
    }

    public function valorado()
    {        
        foreach(Auth::user()->valoraciones as $valoracion)
        {
            if($valoracion->articulo_id == $this->id){
                return true;
            }
        }
        return false;
    }
}
