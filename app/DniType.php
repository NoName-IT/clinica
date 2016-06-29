<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DniType extends Model
{
    //

    protected $fillable = [
        'name', 
    ];
    
    
    public function patients()
    {
        return $this->hasMany('App\Patient');
    }
}
