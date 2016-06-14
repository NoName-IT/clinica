<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
	public $timestamps = false;


 	public function cities()
    {
        return $this->hasMany('App\City');
    }
    public function province()
    {
        return $this->belongsTo('App\Province');
    }
}
