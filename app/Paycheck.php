<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Paycheck extends Model
{
    //
    //
     use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    

    protected $fillable = [
        'year', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12',
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
