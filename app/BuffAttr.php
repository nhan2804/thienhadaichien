<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuffAttr extends Model
{
    protected $primaryKey = 'id_buff_a';
    protected $table = 'buff_attr';
    public function name_resource()
    {
    	return $this->belongsTo('App\Resource','id_resourse','id_resource');
    }
}
