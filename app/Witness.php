<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Witness extends Model
{
    //
     use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    

    public function internment()
    {
        return $this->belongsTo('App\Internment');
    }


    public function relationship()
    {
        return $this->belongsTo('App\Relationship');
    }

}
