<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $table = "categorias";

    public function imagenes()
    {
        return $this->hasMany('App\Imagen');
    }

    public function sub_categorias()
    {
    	return $this->hasMany('App\SubCategoria');
	}
}
