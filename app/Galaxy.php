<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galaxy extends Model
{
    //
    protected $primaryKey = 'id';
    protected $table = 'galaxy';
    public $timestamps = false;
}
