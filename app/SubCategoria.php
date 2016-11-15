<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
	protected $table = "sub_categorias";

	public function articulos()
	{
		return $this->belongsToMany('App\Articulo', 'subcategoria_articulo');
	}

	public function categoria()
	{
		return $this->belongsTo('App\Categoria');
	}
}
