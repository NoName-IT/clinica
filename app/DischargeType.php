<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DischargeType extends Model
{
    //

    protected $fillable = [
        'name', 
    ];
    
    
    public function patients()
    {
        return $this->hasMany('App\Internment');
    }
}