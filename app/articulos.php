<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class articulos extends Model
{
	protected $table = "articulos";

    public function imagenes()
    {
        return $this->hasMany('App\imagenes');
    }

    public function ventas()
    {
        return $this->hasMany('App\ventas');
    }

    public function valoraciones()
    {
        return $this->belongsTo('App\valoraciones');
    }

    public function categorias(){
    	return $this->belongsToMany('App\categorias');
	}
}
