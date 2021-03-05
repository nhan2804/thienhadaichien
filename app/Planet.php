<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    protected $table = 'planet';
    protected $primaryKey = 'id_planet';
    public function cate()
    {
    	return $this->hasMany('App\CatePlanet', 'id_cate_p', 'id_planet');
    }
}
