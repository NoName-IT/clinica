<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medic extends Model
{
    //

    public function internments()
    {
        return $this->belongsToMany('App\Internment');
    }
}
