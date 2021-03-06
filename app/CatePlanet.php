<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatePlanet extends Model
{
    protected $table = 'cate_planet';
    protected $primaryKey = 'id_cate_p';
    public function planet($value='')
    {
    	return $this->belongsTo('App\Planet','id_cate_p','id_planet');
    }
}
