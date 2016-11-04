<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
	protected $table = "valoraciones";

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function articulo()
    {
        return $this->belongsTo('App\Articulo');
    }
}
