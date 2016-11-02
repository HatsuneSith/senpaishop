<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
	protected $table = "usuarios";

    public function ventas()
    {
        return $this->hasMany('App\ventas');
    }

    public function roles()
    {
        return $this->belongsTo('App\roles');
    }

    public function valoraciones()
    {
        return $this->belongsTo('App\valoraciones');
    }
}
