<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
	protected $table = "imagenes";

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function articulo()
    {
        return $this->belongsTo('App\Articulo');
    }
}