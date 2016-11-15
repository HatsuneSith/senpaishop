<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
	protected $table = "sub_categorias";

	public function articulos()
	{
		return $this->hasMany('App\Articulo');
	}

	public function categoria()
	{
		return $this->belongsTo('App\Categoria');
	}	
}
