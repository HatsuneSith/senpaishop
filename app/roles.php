<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
	protected $table = "roles";

    public function usuarios()
    {
        return $this->hasMany('App\usuarios');
    }
}
