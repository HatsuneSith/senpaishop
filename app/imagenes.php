<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imagenes extends Model
{
	protected $table = "imagenes";

    public function categorias()
    {
        return $this->belongsTo('App\categorias');
    }

    public function articulos()
    {
        return $this->belongsTo('App\articulos');
    }
}
