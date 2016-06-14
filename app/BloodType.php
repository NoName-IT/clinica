<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    //

    public function patients()
    {
        return $this->hasMany('App\Patient');
    }
}
