<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
	protected $table = "categorias";

    public function imagenes()
    {
        return $this->hasMany('App\imagenes');
    }

    public function articulos(){
    	return $this->belongsToMany('App\articulos');
	}
}
