<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MilitaryAction extends Model
{
    //
    protected $primaryKey = 'id_m_a';
    protected $table = 'military_action';
    public $timestamps = false;
    // protected $fillable = ['id_user'];
}
