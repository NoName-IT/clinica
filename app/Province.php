<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
	public $timestamps = false;

 	public function departments()
    {
        return $this->hasMany('App\Department');
    }


}